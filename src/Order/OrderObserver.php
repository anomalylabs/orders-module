<?php namespace Anomaly\OrdersModule\Order;

use Anomaly\OrdersModule\Order\Command\CalculateTotals;
use Anomaly\OrdersModule\Order\Command\SetIpAddress;
use Anomaly\OrdersModule\Order\Command\SetNumber;
use Anomaly\OrdersModule\Order\Command\SetStrId;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Order\Event\OrderWasCreated;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class OrderObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\OrdersModule\Order
 */
class OrderObserver extends EntryObserver
{

    /**
     * Fired just before saving the entry.
     *
     * @param EntryInterface|OrderInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        $this->dispatch(new SetStrId($entry));
        $this->dispatch(new SetNumber($entry));
        $this->dispatch(new SetIpAddress($entry));

        parent::creating($entry);
    }

    /**
     * Run after a record is created.
     *
     * @param EntryInterface|OrderInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->events->dispatch(new OrderWasCreated($entry));

        parent::created($entry);
    }

    /**
     * Fired just before saving the entry.
     *
     * @param  EntryInterface|OrderInterface $entry
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new CalculateTotals($entry));

        parent::saving($entry);
    }
}
