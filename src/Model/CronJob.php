<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model;

use Magento\Framework\DataObject;
use Serializator\PrometheusExporter\Api\Data\CronJobInterface;

/**
 * A Data Transfer Object (DTO) containing information about a cron job
 */
class CronJob extends DataObject implements CronJobInterface {
    public const CODE = 'code';
    public const STATUS = 'status';
    public const CREATED_AT = 'created_at';
    public const SCHEDULED_AT = 'scheduled_at';
    public const EXECUTED_AT = 'executed_at';
    public const FINISHED_AT = 'finished_at';

    /** @inheritDoc */
    public function getCode(): string {
        return $this->_getData(static::CODE);
    }

    /** @inheritDoc */
    public function getStatus(): string {
        return $this->_getData(static::STATUS);
    }

    /** @inheritDoc */
    public function getCreatedAt(): string {
        return $this->_getData(static::CREATED_AT);
    }

    /** @inheritDoc */
    public function getScheduledAt(): string {
        return $this->_getData(static::SCHEDULED_AT);
    }

    /** @inheritDoc */
    public function getExecutedAt(): ?string {
        return $this->_getData(static::EXECUTED_AT);
    }

    /** @inheritDoc */
    public function getFinishedAt(): ?string {
        return $this->_getData(static::FINISHED_AT);
    }
}
