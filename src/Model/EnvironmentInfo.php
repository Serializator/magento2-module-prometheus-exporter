<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model;

use Serializator\PrometheusExporter\Api\Data\EnvironmentInfoInterface;

/**
 * A Data Transfer Object (DTO) containing information about the Magento 2 environment
 */
class EnvironmentInfo implements EnvironmentInfoInterface {
    private string $version;
    private string $edition;
    private string $mode;

    public function __construct(string $version, string $edition, string $mode) {
        $this->version = $version;
        $this->edition = $edition;
        $this->mode = $mode;
    }

    /** @inheritDoc */
    public function getVersion(): string {
        return $this->version;
    }

    /** @inheritDoc */
    public function getEdition(): string {
        return $this->edition;
    }

    /** @inheritDoc */
    public function getMode(): string {
        return $this->mode;
    }
}
