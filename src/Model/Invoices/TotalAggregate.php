<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model\Invoices;

use Serializator\PrometheusExporter\Api\Data\Invoices\TotalAggregateInterface;

class TotalAggregate implements TotalAggregateInterface {
    private int $storeId;
    private string $state;
    private int $count;

    public function __construct(int $storeId, string $state, int $count) {
        $this->storeId = $storeId;
        $this->state = $state;
        $this->count = $count;
    }

    /** @inheritDoc  */
    public function getStoreId(): int {
        return $this->storeId;
    }

    /** @inheritDoc */
    public function getState(): string {
        return $this->state;
    }

    /** @inheritDoc */
    public function getCount(): int {
        return $this->count;
    }
}
