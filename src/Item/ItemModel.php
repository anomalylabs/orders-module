<?php namespace Anomaly\OrdersModule\Item;

use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\OrdersModule\Modifier\ModifierModel;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\StoreModule\Contract\PurchasableInterface;
use Anomaly\Streams\Platform\Image\Image;
use Anomaly\Streams\Platform\Model\Orders\OrdersItemsEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ItemModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\OrdersModule\Item
 */
class ItemModel extends OrdersItemsEntryModel implements ItemInterface
{

    /**
     * Get the item image.
     *
     * @return Image|null
     */
    public function getImage()
    {
        return $this
            ->getPurchasable()
            ->getPurchasableImage();
    }

    /**
     * Get the price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the total.
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the subtotal.
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Get the tax.
     *
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Get the quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the related order.
     *
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Get related modifiers.
     *
     * @return ModifierCollection
     */
    public function getModifiers()
    {
        return $this->modifiers;
    }

    /**
     * Return the modifiers relationship.
     *
     * @return HasMany
     */
    public function modifiers()
    {
        return $this->hasMany(ModifierModel::class, 'item_id')
            ->where('target', 'item');
    }

    /**
     * Get the related purchasable.
     *
     * @return null|PurchasableInterface
     */
    public function getPurchasable()
    {
        return $this->purchasable;
    }
}
