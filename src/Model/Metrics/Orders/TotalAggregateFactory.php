<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model\Metrics\Orders;

use InvalidArgumentException;
use Magento\Framework\ObjectManagerInterface;

/**
 * Responsible for creating an instance of {@link TotalAggregate} and validate the arguments passed
 *
 * @see TotalAggregate
 */
class TotalAggregateFactory {
    private ObjectManagerInterface $objectManager;

    public function __construct(ObjectManagerInterface $objectManager) {
        $this->objectManager = $objectManager;
    }

    /**
     * Creates an instance of {@link TotalAggregate}
     *
     * @param int $storeId the store id by which the orders were aggregated
     * @param string $status the status by which the orders were aggregated
     * @param string $state the state by which the orders were aggregated
     * @param string $paymentMethod the payment method by which the orders were aggregated
     * @param int $count the total amount of orders in the aggregation
     * @return TotalAggregate the Data Transfer Object (DTA) representing the total amount of orders
     */
    public function create(int $storeId, string $status, string $state, string $paymentMethod, int $count): TotalAggregate {
        if ($storeId < 0) throw new InvalidArgumentException("storeId can't be a negative number");
        if (empty($status)) throw new InvalidArgumentException("status can't be an empty string");
        if (empty($state)) throw new InvalidArgumentException("state can't be an empty string");
        if (empty($paymentMethod)) throw new InvalidArgumentException("paymentMethod can't be an empty string");
        if ($count < 0) throw new InvalidArgumentException("count can't be a negative number");

        return $this->objectManager->create(TotalAggregate::class, [
            'storeId' => $storeId,
            'status' => $status,
            'state' => $state,
            'paymentMethod' => $paymentMethod,
            'count' => $count
        ]);
    }
}
