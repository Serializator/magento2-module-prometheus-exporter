<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model\Metrics;

use Serializator\PrometheusExporter\Api\Data\Metrics\OrdersInterface;
use Serializator\PrometheusExporter\Model\Metrics\Orders\TotalAggregate;

/**
 * A Data Transfer Object (DTO) containing information for the orders collector in the Prometheus exporter
 *
 * @link https://github.com/Serializator/magento2-prometheus-exporter-golang/blob/main/collector/orders.go
 */
class Orders implements OrdersInterface {
    private array $total;

    /**
     * @param TotalAggregate[] $total
     */
    public function __construct(array $total) {
        $this->total = $total;
    }

    /** @inheritDoc */
    public function getTotal(): array {
        return $this->total;
    }
}
