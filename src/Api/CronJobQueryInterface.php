<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api;

use Serializator\PrometheusExporter\Api\Data\CronJobInterface;

/**
 * Responsible for querying / retrieving cron jobs which are scheduled to run or already ran
 */
interface CronJobQueryInterface {

    /**
     * PHPDoc required by Magento 2 for it to be used as a REST API
     *
     * @return CronJobInterface[]
     */
    public function execute(): array;
}
