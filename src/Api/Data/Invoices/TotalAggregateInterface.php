<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Data\Invoices;

/**
 * Represents a Data Transfer Object (DTO) containing information about the total amount of invoices, aggregated by a set of properties
 */
interface TotalAggregateInterface {

    /**
     * Get the store id by which the invoices were aggregated
     *
     * @return int the store id by which the invoices were aggregated
     */
    public function getStoreId(): int;

    /**
     * Get the state by which the invoices were aggregated
     *
     * @return string the state by which the invoices were aggregated
     */
    public function getState(): string;

    /**
     * Get the amount of invoices in the aggregation
     *
     * @return int the amount of invoices in the aggregation
     */
    public function getCount(): int;
}
