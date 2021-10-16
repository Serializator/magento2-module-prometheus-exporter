<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Query;

use Magento\Framework\App\ProductMetadataInterface;
use Magento\Framework\App\State;
use Serializator\PrometheusExporter\Api\Data\EnvironmentInfoInterface;
use Serializator\PrometheusExporter\Api\EnvironmentInfoQueryInterface;
use Serializator\PrometheusExporter\Model\EnvironmentInfoFactory;

class EnvironmentInfoQuery implements EnvironmentInfoQueryInterface {
    private ProductMetadataInterface $productMetadata;
    private State $state;
    private EnvironmentInfoFactory $environmentInfoFactory;

    public function __construct(
        ProductMetadataInterface $productMetadata,
        State $state,
        EnvironmentInfoFactory $environmentInfoFactory
    ) {
        $this->productMetadata = $productMetadata;
        $this->state = $state;
        $this->environmentInfoFactory = $environmentInfoFactory;
    }

    /** @inheritDoc */
    public function execute(): EnvironmentInfoInterface {
        return $this->environmentInfoFactory->create([
            'version' => $this->productMetadata->getVersion(),
            'edition' => $this->productMetadata->getEdition(),
            'mode' => $this->state->getMode()
        ]);
    }
}
