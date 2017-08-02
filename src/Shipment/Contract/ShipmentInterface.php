<?php namespace Anomaly\OrdersModule\Shipment\Contract;

use Anomaly\ShippingModule\Method\Contract\MethodInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface ShipmentInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ShipmentInterface extends EntryInterface
{

    /**
     * Get the shipping method.
     *
     * @return MethodInterface
     */
    public function getMethod();

    /**
     * Get the tracking code.
     *
     * @return string
     */
    public function getTracking();
}
