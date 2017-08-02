<?php namespace Anomaly\OrdersModule\Order;

use Anomaly\CustomersModule\Address\Contract\AddressInterface;
use Anomaly\OrdersModule\Item\ItemCollection;
use Anomaly\OrdersModule\Item\ItemModel;
use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\OrdersModule\Modifier\ModifierModel;
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
        //'items', // Causes totaling issues.
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
            ->where('target', 'order');
    }

    /**
     * Get the billing address.
     *
     * @return AddressInterface
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Get the shipping address.
     *
     * @return AddressInterface
     */
    public function getShippingAddress()
    {
        return $this->billing_address;
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
}
