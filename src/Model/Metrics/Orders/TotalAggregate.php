<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model\Metrics\Orders;

use Serializator\PrometheusExporter\Api\Data\Metrics\Orders\TotalAggregateInterface;

class TotalAggregate implements TotalAggregateInterface {
    private int $storeId;
    private string $status;
    private string $state;
    private string $paymentMethod;
    private int $count;

    public function __construct(int $storeId, string $status, string $state, string $paymentMethod, int $count) {
        $this->storeId = $storeId;
        $this->status = $status;
        $this->state = $state;
        $this->paymentMethod = $paymentMethod;
        $this->count = $count;
    }

    /** @inheritDoc */
    public function getStoreId(): int {
        return $this->storeId;
    }

    /** @inheritDoc */
    public function getStatus(): string {
        return $this->status;
    }

    /** @inheritDoc */
    public function getState(): string {
        return $this->state;
    }

    /** @inheritDoc */
    public function getPaymentMethod(): string {
        return $this->paymentMethod;
    }

    /** @inheritDoc */
    public function getCount(): int {
        return $this->count;
    }
}
