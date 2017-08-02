<?php namespace Anomaly\OrdersModule\Order\Command;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;

/**
 * Class SetStrId
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetStrId
{

    /**
     * The order instance.
     *
     * @var OrderInterface $order
     */
    protected $order;

    /**
     * Create a new SetStrId instance.
     *
     * @param OrderInterface $order
     */
    public function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        if (!$this->order->getStrId()) {
            $this->order->setAttribute('str_id', str_random(24));
        }
    }
}
