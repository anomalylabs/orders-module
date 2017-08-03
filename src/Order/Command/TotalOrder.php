<?php namespace Anomaly\OrdersModule\Order\Command;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;

/**
 * Class TotalOrder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TotalOrder
{

    /**
     * The order instance.
     *
     * @var OrderInterface
     */
    protected $order;

    /**
     * Create a new TotalOrder instance.
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
        $items = $this->order->getItems();

        $this->order->setAttribute('quantity', $items->quantity());
        $this->order->setAttribute('subtotal', $items->subtotal());
        $this->order->setAttribute('tax', $items->tax() + $this->order->calculate('tax'));
        $this->order->setAttribute('shipping', $items->shipping() + $this->order->calculate('shipping'));
        $this->order->setAttribute('discounts', $items->discounts() + $this->order->calculate('discount'));

        $this->order->setAttribute(
            'total',
            $this->order->getSubtotal()
            - $this->order->getDiscounts()
            + $this->order->getShipping()
            + $this->order->getTax()
        );
    }
}
