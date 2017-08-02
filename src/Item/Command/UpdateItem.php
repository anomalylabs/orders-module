<?php namespace Anomaly\OrdersModule\Item\Command;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Item\Contract\ItemRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class UpdateItem
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class UpdateItem
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
    protected $id;

    /**
     * The item parameters.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Create a new UpdateItem instance.
     *
     * @param OrderInterface $order
     * @param $item
     * @param int $quantity
     */
    public function __construct(OrderInterface $order, $id, array $parameters)
    {
        $this->id         = $id;
        $this->order       = $order;
        $this->parameters = $parameters;
    }

    /**
     * Handle the command.
     *
     * @return ItemInterface
     * @throws \Exception
     */
    public function handle(ItemRepositoryInterface $items)
    {
        /* @var ItemInterface|EloquentModel $item */
        $item = $this->order->getItems()->find($this->id);

        if ($quantity = array_pull($this->parameters, 'quantity')) {
            $item->setAttribute('quantity', $quantity);
        }

        $item->fill($this->parameters);

        $items->save($item);

        return $item;
    }
}
