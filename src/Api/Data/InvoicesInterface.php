<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Data;

/**
 * Represents a Data Transfer Object (DTO) containing information for the invoices collector in the Prometheus exporter
 *
 * @link https://github.com/Serializator/magento2-prometheus-exporter-golang/blob/main/collector/invoices.go
 */
interface InvoicesInterface {

    /**
     * Get the total amount of invoices, aggregated by a set of properties
     *
     * @return \Serializator\PrometheusExporter\Api\Data\Invoices\TotalAggregateInterface[]
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getTotal(): array;
}
