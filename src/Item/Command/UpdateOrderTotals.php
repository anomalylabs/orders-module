<?php namespace Anomaly\OrdersModule\Item\Command;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Order\Contract\OrderRepositoryInterface;

/**
 * Class UpdateOrderTotals
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateOrderTotals
{

    /**
     * The order instance.
     *
     * @var ItemInterface
     */
    protected $item;

    /**
     * Create a new UpdateOrderTotals instance.
     *
     * @param ItemInterface $item
     */
    public function __construct(ItemInterface $item)
    {
        $this->item = $item;
    }

    /**
     * Handle the command.
     *
     * @param OrderRepositoryInterface $orders
     */
    public function handle(OrderRepositoryInterface $orders)
    {
        $orders->save($this->item->getOrder());
    }
}
