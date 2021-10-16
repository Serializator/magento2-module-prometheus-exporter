<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Api\Data;

/**
 * Represents a Data Transfer Object (DTO) containing information about the Magento 2 environment
 */
interface EnvironmentInfoInterface {

    /**
     * Get the version of Magento
     *
     * @return string the version of Magento
     */
    public function getVersion(): string;

    /**
     * Get the edition of Magento (e.g. "Community" or "Commerce")
     *
     * @return string the edition of Magento
     */
    public function getEdition(): string;

    /**
     * Get the mode in which Magento is running (e.g. "default", "production" or "developer")
     *
     * @return string the mode in which Magento is running
     */
    public function getMode(): string;
}
