<?php namespace Anomaly\OrdersModule\Item\Command;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Item\Contract\ItemRepositoryInterface;
use Anomaly\OrdersModule\Item\ItemModel;
use Anomaly\ProductsModule\Contract\PurchasableInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddItem
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AddItem
{

    use DispatchesJobs;

    /**
     * The order instance.
     *
     * @var OrderInterface
     */
    protected $order;

    /**
     * The item payload.
     *
     * @var mixed
     */
    protected $item;

    /**
     * The item quantity.
     *
     * @var int
     */
    protected $quantity;

    /**
     * Create a new AddItem instance.
     *
     * @param OrderInterface $order
     * @param               $item
     * @param int           $quantity
     */
    public function __construct(OrderInterface $order, $item, $quantity = 1)
    {
        $this->order     = $order;
        $this->item     = $item;
        $this->quantity = $quantity;
    }

    /**
     * Handle the command.
     *
     * @throws \Exception
     */
    public function handle(ItemRepositoryInterface $items)
    {
        if ($this->item instanceof PurchasableInterface) {

            if (!$this->item->isPurchasable()) {
                throw new \Exception('Item is not purchasable at this time.');
            }

            /* @var ItemInterface|EloquentModel $item */
            if ($item = $this->order->getItems()->findBy('sku', $this->item->getPurchasableSku())) {

                $this->dispatch(new ProcessItem($item));

                $items->save($item->setAttribute('quantity', $item->getQuantity() + $this->quantity));

                return;
            }

            $items->save(
                $item = new ItemModel(
                    [
                        'order'     => $this->order,
                        'quantity' => $this->quantity,
                        'sku'      => $this->item->getPurchasableSku(),
                        'name'     => $this->item->getPurchasableName(),
                        'price'    => $this->item->getPurchasablePrice(),
                        'entry'    => $this->item,
                    ]
                )
            );

            $this->dispatch(new ProcessItem($item));

            $items->save($item);

            return;
        }

        $items->save(
            $item = new ItemModel(
                array_merge(
                    [
                        'order'     => $this->order,
                        'quantity' => $this->quantity,
                    ],
                    $this->item
                )
            )
        );

        $this->dispatch(new ProcessItem($item));

        $items->save($item);
    }
}
