<?php namespace Anomaly\OrdersModule\Item;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;

/**
 * Class ItemPresenter
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ItemPresenter extends EntryPresenter
{

    /**
     * The decorated object.
     *
     * @var ItemInterface
     */
    protected $object;
}
