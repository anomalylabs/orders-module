<?php namespace Anomaly\OrdersModule\Shipment;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\ShippingModule\Group\GroupCollection;
use Anomaly\StoreModule\Contract\ShippableInterface;

class ShipmentResolver
{

    /**
     * Resolve a number of shipping groups.
     *
     * @param OrderInterface $order
     * @return GroupCollection
     */
    public function resolve(OrderInterface $order)
    {
        $groups = [];

        /* @var ItemInterface $item */
        foreach ($order->getItems() as $item) {

            if (!$purchasable = $item->getPurchasable()) {
                continue;
            }

            if (!$purchasable instanceof ShippableInterface) {
                continue;
            }

            if (!$purchasable->isShippable()) {
                continue;
            }

            $group = $purchasable->getShippingGroup();

            $groups[$group->getId()] = $group;
        }

        return new GroupCollection($groups);
    }
}
