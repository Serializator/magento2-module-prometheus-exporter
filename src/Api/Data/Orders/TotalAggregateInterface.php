<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Data\Orders;

/**
 * Represents a Data Transfer Object (DTO) containing information about the total amount of orders, aggregated by a set of properties
 */
interface TotalAggregateInterface {

    /**
     * Get the store id by which the orders were aggregated
     *
     * @return int the store id by which the orders were aggregated
     */
    public function getStoreId(): int;

    /**
     * Get the status by which the orders were aggregated
     *
     * @return string the status by which the orders were aggregated
     */
    public function getStatus(): string;

    /**
     * Get the state by which the orders were aggregated
     *
     * @return string the state by which the orders were aggregated
     */
    public function getState(): string;
    /**
     * Get the payment method by which the orders were aggregated
     *
     * @return string the payment method by which the orders were aggregated
     */
    public function getPaymentMethod(): string;

    /**
     * Get the amount of orders in the aggregation
     *
     * @return int the amount of orders in the aggregation
     */
    public function getCount(): int;
}
