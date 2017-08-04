<?php namespace Anomaly\OrdersModule\Order;

use Anomaly\StoreModule\Contract\CartInterface;
use Anomaly\StoreModule\Contract\OrderInterface;

/**
 * Class OrderConverter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderConverter
{

    /**
     * Convert a cart to an order.
     *
     * @param CartInterface $cart
     * @return OrderInterface
     */
    public function convert(CartInterface $cart)
    {
        $order = new OrderModel(
            [
                'total'    => $cart->total(),
                'subtotal' => $cart->subtotal(),
            ]
        );

        $order->save();

        foreach ($cart->items() as $item) {

        }

        return null;
    }
}
