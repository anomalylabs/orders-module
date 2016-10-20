<?php namespace Anomaly\OrdersModule\Order;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Order\Contract\OrderRepositoryInterface;

/**
 * Class OrderSequence
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderSequence
{

    /**
     * The order repository.
     *
     * @var OrderRepositoryInterface
     */
    protected $orders;

    /**
     * Create a new OrderSequence instance.
     *
     * @param OrderRepositoryInterface $orders
     */
    public function __construct(OrderRepositoryInterface $orders)
    {
        $this->orders = $orders;
    }

    /**
     * Return the next order number.
     *
     * @param null $default
     * @return null|string
     */
    public function next($default = null)
    {
        /* @var OrderInterface $last */
        if (!$last = $this->orders->first('DESC')) {
            return $default;
        }

        return $this->increment($last);
    }

    /**
     * Increment the order number.
     *
     * @param OrderInterface $last
     * @return string
     */
    public function increment(OrderInterface $last)
    {
        $number = $last->getNumber();

        return ++$number;
    }
}
