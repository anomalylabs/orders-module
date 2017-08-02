<?php namespace Anomaly\OrdersModule\Shipment;

use Anomaly\OrdersModule\Shipment\Contract\ShipmentInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class ShipmentObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ShipmentObserver extends EntryObserver
{

    /**
     * Run after saving a record.
     *
     * @param EntryInterface|ShipmentInterface $entry
     */
    public function saved(EntryInterface $entry)
    {

        parent::saved($entry);
    }
}
