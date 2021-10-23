<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model;

use Serializator\PrometheusExporter\Api\Data\Invoices\TotalAggregateInterface;
use Serializator\PrometheusExporter\Api\Data\InvoicesInterface;

/**
 * A Data Transfer Object (DTO) containing information for the invoices collector in the Prometheus exporter
 *
 * @link https://github.com/Serializator/magento2-prometheus-exporter-golang/blob/main/collector/invoices.go
 */
class Invoices implements InvoicesInterface {

    /** @var TotalAggregateInterface[] */
    private array $total;

    /**
     * Invoices constructor
     *
     * @param TotalAggregateInterface[] $total
     */
    public function __construct(array $total) {
        $this->total = $total;
    }

    /** @inheritDoc */
    public function getTotal(): array {
        return $this->total;
    }
}
