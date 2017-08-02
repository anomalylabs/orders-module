<?php namespace Anomaly\OrdersModule\Item\Command;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Item\Contract\ItemRepositoryInterface;

/**
 * Class RemoveItem
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RemoveItem
{

    /**
     * The order instance.
     *
     * @var OrderInterface
     */
    protected $order;

    /**
     * The item ID.
     *
     * @var int
     */
    protected $item;

    /**
     * Create a new RemoveItem instance.
     *
     * @param OrderInterface $order
     * @param $id
     */
    public function __construct(OrderInterface $order, $id)
    {
        $this->order = $order;
        $this->id   = $id;
    }

    /**
     * Handle the command.
     *
     * @param ItemRepositoryInterface $items
     */
    public function handle(ItemRepositoryInterface $items)
    {
        $items->delete(
            $this->order
                ->getItems()
                ->find($this->id)
        );
    }
}
