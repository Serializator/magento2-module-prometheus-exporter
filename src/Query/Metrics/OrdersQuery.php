<?php
declare(strict_types=1);

namespace Serializator\PrometheusExporter\Query\Metrics;

use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Model\ResourceModel\Order as OrderResource;
use Serializator\PrometheusExporter\Api\Data\Metrics\OrdersInterface;
use Serializator\PrometheusExporter\Api\Metrics\OrdersQueryInterface;
use Serializator\PrometheusExporter\Exception\Query\OrderQueryException;
use Serializator\PrometheusExporter\Model\Metrics\OrdersFactory;
use Serializator\PrometheusExporter\Model\Metrics\Orders\TotalAggregate;
use Serializator\PrometheusExporter\Model\Metrics\Orders\TotalAggregateFactory;

class OrdersQuery implements OrdersQueryInterface {
    private OrderResource $orderResource;
    private OrdersFactory $ordersFactory;
    private TotalAggregateFactory $totalFactory;

    public function __construct(
        OrderResource $orderResource,
        OrdersFactory $ordersFactory,
        TotalAggregateFactory $totalFactory
    ) {
        $this->orderResource = $orderResource;
        $this->ordersFactory = $ordersFactory;
        $this->totalFactory = $totalFactory;
    }

    /** @inheritDoc */
    public function execute(): OrdersInterface {
        $total = array_map(function (array $order): TotalAggregate {
            return $this->totalFactory->create(
                (int) $order['store_id'],
                $order['status'],
                $order['state'],
                $order['payment_method'],
                (int) $order['count']
            );
        }, $this->fetchOrders());

        return $this->ordersFactory->create(['total' => $total]);
    }

    /**
     * Performs an SQL query on the "sales_order" table which aggregates them and performs a count to get the total amount
     *
     * @return array the columns by which the orders were aggregated and the total amount of orders in this aggregation
     * @throws OrderQueryException thrown if something went wrong whilst trying to query the orders
     */
    public function fetchOrders(): array {
        $connection = $this->orderResource->getConnection();

        try {
            $query = $connection->select()
                ->from(['main_table' => $this->orderResource->getMainTable()], ['store_id', 'status', 'state', 'COUNT(*) AS count'])
                ->join(
                    ['order_payment' => $connection->getTableName('sales_order_payment')],
                    'main_table.entity_id = order_payment.parent_id',
                    ['method AS payment_method']
                )->group(['store_id', 'status', 'state', 'payment_method']);
        } catch (LocalizedException $exception) {
            throw new OrderQueryException(__('Something went wrong whilst trying to query the orders'), $exception);
        }

        return $connection->fetchAll($query);
    }
}
