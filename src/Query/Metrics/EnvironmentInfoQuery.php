<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Query\Metrics;

use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\App\State;
use Serializator\PrometheusExporter\Api\Data\Metrics\EnvironmentInfoInterface;
use Serializator\PrometheusExporter\Api\Metrics\EnvironmentInfoQueryInterface;
use Serializator\PrometheusExporter\Model\Metrics\EnvironmentInfoBuilderFactory;

class EnvironmentInfoQuery implements EnvironmentInfoQueryInterface {
    private ProductMetadataInterface $productMetadata;
    private State $state;
    private EnvironmentInfoBuilderFactory $environmentInfoBuilderFactory;

    public function __construct(
        ProductMetadataInterface $productMetadata,
        State $state,
        EnvironmentInfoBuilderFactory $environmentInfoBuilderFactory
    ) {
        $this->productMetadata = $productMetadata;
        $this->state = $state;
        $this->environmentInfoBuilderFactory = $environmentInfoBuilderFactory;
    }

    /** @inheritDoc */
    public function execute(): EnvironmentInfoInterface {
        return $this->environmentInfoBuilderFactory->create()
            ->setVersion($this->productMetadata->getVersion())
            ->setEdition($this->productMetadata->getEdition())
            ->setMode($this->state->getMode())
            ->create();
    }
}
