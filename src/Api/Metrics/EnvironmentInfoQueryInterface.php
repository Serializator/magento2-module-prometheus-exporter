<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Metrics;

use Serializator\PrometheusExporter\Api\Data\Metrics\EnvironmentInfoInterface;

/**
 * Responsible for querying / retrieving information about the Magento 2 environment
 */
interface EnvironmentInfoQueryInterface {

    /**
     * PHPDoc required by Magento 2 for it to be used as a REST API
     *
     * @return EnvironmentInfoInterface
     */
    public function execute(): EnvironmentInfoInterface;
}
