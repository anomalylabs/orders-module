<?php namespace Anomaly\OrdersModule\Item;

use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Item\Contract\ItemInterface;
use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\OrdersModule\Modifier\ModifierModel;
use Anomaly\ProductsModule\Contract\PurchasableInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
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
     * The cascading relations.
     *
     * @var array
     */
    protected $cascades = [
        'modifiers',
    ];

    /**
     * The eager loaded relations.
     *
     * @var array
     */
    protected $with = [
        //'modifiers',
    ];

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
     * Get the shipping.
     *
     * @return float
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Get the discounts.
     *
     * @return float
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * Get the quantity.
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the image.
     *
     * @return null|Image
     */
    public function getImage()
    {
        $entry = $this->getEntry();

        if ($entry && $entry instanceof PurchasableInterface) {
            return $entry->getPurchasableImage();
        }

        return null;
    }

    /**
     * Calculate total adjustments.
     *
     * @param $type
     * @return float
     */
    public function calculate($type)
    {
        $modifiers = $this
            ->getModifiers()
            ->type($type);

        return $modifiers->calculate($this->getSubtotal());
    }

    /**
     * Get the entry.
     *
     * @return EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the order.
     *
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Get the order ID.
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
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
        return $this->hasMany(ModifierModel::class, 'item_id');
    }

    /**
     * Get the options.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get the options attribute.
     *
     * @return array
     */
    public function getOptionsAttribute()
    {
        if (!isset($this->attributes['options'])) {
            return [];
        }

        return unserialize($this->attributes['options']);
    }

    /**
     * Set the options attribute.
     *
     * @param array $options
     * @return $this
     */
    public function setOptionsAttribute(array $options)
    {
        $this->attributes['options'] = serialize($options);

        return $this;
    }

}
