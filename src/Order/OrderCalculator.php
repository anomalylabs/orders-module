<?php namespace Anomaly\OrdersModule\Order;

use Anomaly\OrdersModule\Modifier\Contract\ModifierInterface;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;

/**
 * Class OrderCalculator
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderCalculator
{

    /**
     * Process the order calculations.
     *
     * @param OrderInterface $order
     * @return OrderInterface
     */
    public function process(OrderInterface $order)
    {
        $this
            ->tax($order)
            ->shipping($order)
            ->total($order)
            ->subtotal($order)
            ->quantity($order);

        return $order;
    }

    /**
     * Process the tax.
     *
     * @param OrderInterface $order
     * @return $this
     */
    public function tax(OrderInterface $order)
    {
        $items = $order->getItems();

        $order->setAttribute('tax', $items->tax());

        return $this;
    }

    /**
     * Process the shipping.
     *
     * @param OrderInterface $order
     * @return $this
     */
    public function shipping(OrderInterface $order)
    {
        $items = $order->getItems();

        $order->setAttribute('tax', $items->tax());

        return $this;
    }

    /**
     * Process the discounts.
     *
     * @param OrderInterface $order
     * @return $this
     */
    public function discounts(OrderInterface $order)
    {
        $items = $order->getItems();

        $order->setAttribute('discounts', $items->tax());

        return $this;
    }

    /**
     * Process the total.
     *
     * @param OrderInterface $order
     * @return $this
     */
    public function total(OrderInterface $order)
    {
        $items = $order->getItems();

        $order->setAttribute('total', $this->adjust($order, $items->total()));

        return $this;
    }

    /**
     * Process the subtotal.
     *
     * @param OrderInterface $order
     * @return $this
     */
    public function subtotal(OrderInterface $order)
    {
        $items = $order->getItems();

        $order->setAttribute('subtotal', $items->subtotal());

        return $this;
    }

    /**
     * Process the item quantity.
     *
     * @param OrderInterface $order
     * @return $this
     */
    public function quantity(OrderInterface $order)
    {
        $items = $order->getItems();

        $order->setAttribute('quantity', $items->quantity());

        return $this;
    }

    /**
     * Return the total adjustments.
     *
     * @param OrderInterface $order
     * @param                $type
     * @return $this
     */
    protected function adjustments(OrderInterface $order, $type)
    {
        $items     = $order->getItems();
        $modifiers = $order->getModifiers();

        $modifiers = $modifiers->type($type);

        $order->setAttribute('adjustments', $items->adjustments($type) + $modifiers->calculate($items->total()));

        return $this;
    }

    /**
     * Return the total discounts.
     *
     * @param OrderInterface $order
     * @param                $value
     * @return $value
     */
    protected function adjust(OrderInterface $order, $value)
    {
        $modifiers = $order->getModifiers();

        /* @var ModifierInterface $modifier */
        foreach ($modifiers as $modifier) {
            $value = $modifier->apply($value);
        }

        return $value;
    }
}
