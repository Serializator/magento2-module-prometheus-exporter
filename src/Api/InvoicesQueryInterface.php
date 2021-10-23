<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api;

use Serializator\PrometheusExporter\Api\Data\InvoicesInterface;
use Serializator\PrometheusExporter\Exception\Query\InvoiceQueryException;

/**
 * Responsible for querying / retrieving invoices
 */
interface InvoicesQueryInterface {

    /**
     * PHPDoc required by Magento 2 for it to be used as a REST API
     *
     * @return InvoicesInterface
     * @throws InvoiceQueryException thrown if something went wrong whilst trying to query the invoices
     */
    public function execute(): InvoicesInterface;
}
