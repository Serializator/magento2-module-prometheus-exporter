<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Query;

use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Model\ResourceModel\Order\Invoice as InvoiceResource;
use Serializator\PrometheusExporter\Api\Data\Invoices\TotalAggregateInterface;
use Serializator\PrometheusExporter\Api\Data\InvoicesInterface;
use Serializator\PrometheusExporter\Api\InvoicesQueryInterface;
use Serializator\PrometheusExporter\Exception\Query\InvoiceQueryException;
use Serializator\PrometheusExporter\Model\InvoicesFactory;
use Serializator\PrometheusExporter\Model\Invoices\TotalAggregateFactory;

class InvoicesQuery implements InvoicesQueryInterface {
    private InvoiceResource $invoiceResource;
    private InvoicesFactory $invoicesFactory;
    private TotalAggregateFactory $totalAggregateFactory;

    public function __construct(
        InvoiceResource $invoiceResource,
        InvoicesFactory $invoicesFactory,
        TotalAggregateFactory $totalAggregateFactory
    ) {
        $this->invoiceResource = $invoiceResource;
        $this->invoicesFactory = $invoicesFactory;
        $this->totalAggregateFactory = $totalAggregateFactory;
    }

    /** @inheritDoc */
    public function execute(): InvoicesInterface {
        $total = array_map(function (array $invoice): TotalAggregateInterface {
            return $this->totalAggregateFactory->create(
                (int) $invoice['store_id'],
                $this->parseState((int) $invoice['state']),
                (int) $invoice['count']
            );
        }, $this->fetchInvoices());

        return $this->invoicesFactory->create(['total' => $total]);
    }

    /**
     * Performs an SQL query on the "sales_invoices" table which aggregates them and performs a count to get the total amount
     *
     * @return array the columns by which the invoices were aggregated and the total amount of invoices in this aggregation
     * @throws InvoiceQueryException thrown if something went wrong whilst trying to query the invoices
     */
    public function fetchInvoices(): array {
        $connection = $this->invoiceResource->getConnection();

        try {
            $query = $connection->select()
                ->from(['main_table' => $this->invoiceResource->getMainTable()], ['store_id', 'state', 'COUNT(*) AS count'])
                ->group(['store_id', 'state']);
        } catch (LocalizedException $exception) {
            throw new InvoiceQueryException(__('Something went wrong whilst trying to query the invoices'), $exception);
        }

        return $connection->fetchAll($query);
    }

    /**
     * Parse the numeric representation of the state of the invoice into a human-readable format
     *
     * @param int $state the state to parse into a human-readable format
     * @return string the state in a human-readable format
     */
    public function parseState(int $state): string {
        return [
                1 => 'open',
                2 => 'paid',
                3 => 'cancelled'
            ][$state] ?? 'unknown';
    }
}
