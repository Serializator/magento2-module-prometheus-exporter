<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model\Metrics;

use Magento\Framework\DataObject;
use Serializator\PrometheusExporter\Api\Data\Metrics\EnvironmentInfoInterface;

/**
 * A Data Transfer Object (DTO) containing information about the Magento 2 environment
 */
class EnvironmentInfo extends DataObject implements EnvironmentInfoInterface {
    public const VERSION = 'version';
    public const EDITION = 'edition';
    public const MODE = 'mode';

    /** @inheritDoc */
    public function getVersion(): string {
        return $this->_getData(static::VERSION);
    }

    /** @inheritDoc */
    public function getEdition(): string {
        return $this->_getData(static::EDITION);
    }

    /** @inheritDoc */
    public function getMode(): string {
        return $this->_getData(static::MODE);
    }
}
