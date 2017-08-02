<?php namespace Anomaly\OrdersModule\Item;

use Anomaly\OrdersModule\Order\Command\ProcessOrder;
use Anomaly\OrdersModule\Order\Command\TotalOrder;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Item\Command\TotalItem;
use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Anomaly\Streams\Platform\Model\EloquentModel;

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
     * Before saving an entry touch the
     * meta information.
     *
     * @param  EntryInterface|ItemInterface $entry
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new TotalItem($entry));

        parent::saving($entry);
    }

    /**
     * Run after saving a record.
     *
     * @param EntryInterface|ItemInterface $entry
     */
    public function saved(EntryInterface $entry)
    {
        /* @var OrderInterface|EloquentModel $order */
        $order = $entry->getOrder();

        $order->load('items');

        $this->dispatch(new ProcessOrder($order));
        $this->dispatch(new TotalOrder($order));

        $order->save();

        parent::saved($entry);
    }

    /**
     * Run after a record has been deleted.
     *
     * @param EntryInterface|ItemInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        /* @var OrderInterface|EloquentModel $order */
        $order = $entry->getOrder();

        $this->dispatch(new ProcessOrder($order));
        $this->dispatch(new TotalOrder($order));

        $order->save();
    }

}
