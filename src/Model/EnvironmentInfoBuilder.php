<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Model;

/**
 * Using the "Builder Pattern" allows for a much more declarative way of creating a new instance of the
 * "EnvironmentInfo" class without needing to know what keys within the data object stores what value.
 *
 * @see EnvironmentInfo
 */
class EnvironmentInfoBuilder {
    private EnvironmentInfoFactory $environmentInfoFactory;

    private string $version;
    private string $edition;
    private string $mode;

    public function __construct(EnvironmentInfoFactory $environmentInfoFactory) {
        $this->environmentInfoFactory = $environmentInfoFactory;
    }

    public function setVersion(string $version): self {
        $this->version = $version;
        return $this;
    }

    public function setEdition(string $edition): self {
        $this->edition = $edition;
        return $this;
    }

    public function setMode(string $mode): self {
        $this->mode = $mode;
        return $this;
    }

    public function create(): EnvironmentInfo {
        return $this->environmentInfoFactory->create(['data' => [
            EnvironmentInfo::VERSION => $this->version,
            EnvironmentInfo::EDITION => $this->edition,
            EnvironmentInfo::MODE => $this->mode
        ]]);
    }
}
