<?php namespace Anomaly\OrdersModule\Item;

use Anomaly\OrdersModule\Item\Command\CalculateTotals;
use Anomaly\OrdersModule\Item\Command\ProcessTaxes;
use Anomaly\OrdersModule\Item\Command\UpdateOrderTotals;
use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class ItemObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ItemObserver extends EntryObserver
{

    /**
     * Fired just before saving the entry.
     *
     * @param  EntryInterface|ItemInterface $entry
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new CalculateTotals($entry));

        parent::saving($entry);
    }

    /**
     * Fired just after saving the entry.
     *
     * @param  EntryInterface|ItemInterface $entry
     */
    public function saved(EntryInterface $entry)
    {
        $this->dispatch(new UpdateOrderTotals($entry));

        parent::saved($entry);
    }

    /**
     * Fired just after saving the entry.
     *
     * @param  EntryInterface|ItemInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->dispatch(new UpdateOrderTotals($entry));

        parent::saved($entry);
    }
}
