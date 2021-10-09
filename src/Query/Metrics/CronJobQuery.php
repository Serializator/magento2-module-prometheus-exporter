<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Query\Metrics;

use Serializator\PrometheusExporter\Api\Data\Metrics\CronJobInterface;
use Serializator\PrometheusExporter\Api\Metrics\CronJobQueryInterface;
use Magento\Cron\Model\ResourceModel\Schedule as CronJobScheduleResource;
use Serializator\PrometheusExporter\Model\Metrics\CronJob;
use Serializator\PrometheusExporter\Model\Metrics\CronJobFactory;

class CronJobQuery implements CronJobQueryInterface {
    private CronJobFactory $cronJobFactory;
    private CronJobScheduleResource $cronJobScheduleResource;

    public function __construct(
        CronJobFactory $cronJobFactory,
        CronJobScheduleResource $cronJobScheduleResource
    ) {
        $this->cronJobFactory = $cronJobFactory;
        $this->cronJobScheduleResource = $cronJobScheduleResource;
    }

    /** @inheritDoc */
    public function execute(): array {
        return array_map(function (array $cronJob): CronJob {
            return $this->cronJobFactory->create(['data' => [
                CronJob::CODE => $cronJob['job_code'],
                CronJob::STATUS => $cronJob['status'],
                CronJob::CREATED_AT => $cronJob['created_at'],
                CronJob::SCHEDULED_AT => $cronJob['scheduled_at'],
                CronJob::EXECUTED_AT => $cronJob['executed_at'],
                CronJob::FINISHED_AT => $cronJob['finished_at']
            ]]);
        }, $this->fetchCronJobs());
    }

    /**
     * Performs an SQL query on the "cron_schedule" table to directly fetch the
     * rows representing scheduled cron jobs with their status
     *
     * @return array the resulting rows from the SQL query
     */
    private function fetchCronJobs(): array {
        $connection = $this->cronJobScheduleResource->getConnection();

        $query = $connection->select()
            ->from($this->cronJobScheduleResource->getTable('cron_schedule'))
            ->columns(['job_code', 'status', 'created_at', 'scheduled_at', 'executed_at', 'finished_at']);

        return $connection->fetchAll($query);
    }
}
