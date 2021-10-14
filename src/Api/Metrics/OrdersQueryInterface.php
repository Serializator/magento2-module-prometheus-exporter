<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Metrics;

use Serializator\PrometheusExporter\Api\Data\Metrics\OrdersInterface;
use Serializator\PrometheusExporter\Exception\Query\OrderQueryException;

/**
 * Responsible for querying / retrieving orders
 */
interface OrdersQueryInterface {

    /**
     * PHPDoc required by Magento 2 for it to be used as a REST API
     *
     * @return OrdersInterface
     * @throws OrderQueryException thrown if something went wrong whilst trying to query the orders
     */
    public function execute(): OrdersInterface;
}
