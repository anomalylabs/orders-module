<?php namespace Anomaly\OrdersModule\Modifier;

use Anomaly\OrdersModule\Modifier\Command\SetOrder;
use Anomaly\OrdersModule\Modifier\Contract\ModifierInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class ModifierObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ModifierObserver extends EntryObserver
{

    /**
     * Run before a record is created.
     *
     * @param EntryInterface|ModifierInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        $this->dispatch(new SetOrder($entry));

        parent::creating($entry);
    }
}
