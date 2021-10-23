<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model\Invoices;

use InvalidArgumentException;
use Magento\Framework\ObjectManagerInterface;

class TotalAggregateFactory {
    private ObjectManagerInterface $objectManager;

    public function __construct(ObjectManagerInterface $objectManager) {
        $this->objectManager = $objectManager;
    }

    public function create(int $storeId, string $state, int $count): TotalAggregate {
        if ($storeId < 0) throw new InvalidArgumentException("storeId can't be a negative number");
        if (empty($state)) throw new InvalidArgumentException("state can't be an empty string");
        if ($count < 0) throw new InvalidArgumentException("count can't be a negative number");

        return $this->objectManager->create(TotalAggregate::class, [
            'storeId' => $storeId,
            'state' => $state,
            'count' => $count
        ]);
    }
}
