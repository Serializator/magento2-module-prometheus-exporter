<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Data\Metrics;

/**
 * Represents a Data Transfer Object (DTO) containing information about a cron job
 */
interface CronJobInterface {

    /**
     * Get the code of the cron job
     *
     * @return string the code of the cron job
     */
    public function getCode(): string;

    /**
     * Get the status of the cron job
     *
     * @return string the status of the cron job
     */
    public function getStatus(): string;

    /**
     * Get when this cron job was created
     *
     * @return string when this cron job was created
     */
    public function getCreatedAt(): string;

    /**
     * Get for when this cron job is or was scheduled
     *
     * @return string for when this cron job is or was scheduled
     */
    public function getScheduledAt(): string;

    /**
     * Get when the cron job was executed, null if the cron job didn't execute yet
     *
     * @return string when the cron job was executed, null if the cron job didn't execute yet
     */
    public function getExecutedAt(): ?string;

    /**
     * Get when the cron job finished executing, null if the cron job didn't execute yet
     *
     * @return string when the cron job finished executing, null if the cron job didn't execute yet
     */
    public function getFinishedAt(): ?string;
}
