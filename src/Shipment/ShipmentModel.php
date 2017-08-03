<?php namespace Anomaly\OrdersModule\Shipment;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Shipment\Contract\ShipmentInterface;
use Anomaly\ShippingModule\Method\Contract\MethodInterface;
use Anomaly\Streams\Platform\Model\Orders\OrdersShipmentsEntryModel;

/**
 * Class ShipmentModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ShipmentModel extends OrdersShipmentsEntryModel implements ShipmentInterface
{

    /**
     * Get the shipping method.
     *
     * @return MethodInterface
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get the tracking code.
     *
     * @return string
     */
    public function getTracking()
    {
        return $this->tracking;
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
