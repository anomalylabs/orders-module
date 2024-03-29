<?php namespace Anomaly\OrdersModule\Order;

use Anomaly\OrdersModule\Item\ItemCollection;
use Anomaly\OrdersModule\Item\ItemModel;
use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\OrdersModule\Modifier\ModifierModel;
use Anomaly\OrdersModule\Order\Billing\Traits\BillingAddress;
use Anomaly\OrdersModule\Order\Billing\Traits\ShippingAddress;
use Anomaly\OrdersModule\Order\Contract\OrderInterface;
use Anomaly\OrdersModule\Shipment\ShipmentCollection;
use Anomaly\OrdersModule\Shipment\ShipmentModel;
use Anomaly\Streams\Platform\Model\Orders\OrdersOrdersEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class OrderModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderModel extends OrdersOrdersEntryModel implements OrderInterface
{

    use BillingAddress;
    use ShippingAddress;

    /**
     * The cascading relations.
     *
     * @var array
     */
    protected $cascades = [
        'items',
        'modifiers',
    ];

    /**
     * Eager loaded relations.
     *
     * @var array
     */
    protected $with = [
        //'items',
    ];

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId()
    {
        return $this->str_id;
    }

    /**
     * Get the email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the number.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the company.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Return the tax.
     *
     * @return float
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Return the order total.
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Return the order subtotal.
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
     * Return the item quantity.
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get related items.
     *
     * @return ItemCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Return the items relationship.
     *
     * @return HasMany
     */
    public function items()
    {
        return $this->hasMany(ItemModel::class, 'order_id');
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
        return $this->hasMany(ModifierModel::class, 'order_id')
            ->whereNull('item_id');
    }

    /**
     * Get the shipments.
     *
     * @return ShipmentCollection
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * Return the shipments relation.
     *
     * @return HasMany
     */
    public function shipments()
    {
        return $this->hasMany(ShipmentModel::class, 'order_id');
    }

    /**
     * Return the total adjustments.
     *
     * @param        $type
     * @param string $target
     */
    public function adjustments($type)
    {
        $items = $this->getItems();

        $modifiers = $this
            ->getModifiers()
            ->type($type);

        return $items->adjustments($type) + $modifiers->calculate($items->total());
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
}
