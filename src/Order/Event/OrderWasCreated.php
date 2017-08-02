<?php namespace Anomaly\OrdersModule\Order\Event;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;

/**
 * Class OrderWasCreated
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderWasCreated
{

    /**
     * The order instance.
     *
     * @var OrderInterface
     */
    protected $order;

    /**
     * Create a new OrderWasCreated instance.
     *
     * @param OrderInterface $order
     */
    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }

    /**
     * Get the order.
     *
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }
}
