<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Data\Metrics;

/**
 * Represents a Data Transfer Object (DTO) containing information for the orders collector in the Prometheus exporter
 *
 * @link https://github.com/Serializator/magento2-prometheus-exporter-golang/blob/main/collector/orders.go
 */
interface OrdersInterface {

    /**
     * Get the total amount of orders, aggregated by a set of properties
     *
     * @return \Serializator\PrometheusExporter\Api\Data\Metrics\Orders\TotalAggregateInterface[]
     * @noinspection PhpFullyQualifiedNameUsageInspection
     */
    public function getTotal(): array;
}
