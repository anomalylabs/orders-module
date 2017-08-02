<?php namespace Anomaly\OrdersModule\Order\Contract;

use Anomaly\CustomersModule\Address\Contract\AddressInterface;
use Anomaly\OrdersModule\Item\ItemCollection;
use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\OrdersModule\Shipment\ShipmentCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface OrderInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\OrdersModule\Order\Contract
 */
interface OrderInterface extends EntryInterface
{

    /**
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the number.
     *
     * @return string
     */
    public function getNumber();

    /**
     * Get the email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getLastName();

    /**
     * Return the tax.
     *
     * @return float
     */
    public function getTax();

    /**
     * Return the order total.
     *
     * @return float
     */
    public function getTotal();

    /**
     * Return the order subtotal.
     *
     * @return float
     */
    public function getSubtotal();

    /**
     * Return the item quantity.
     *
     * @return float
     */
    public function getQuantity();

    /**
     * Get related items.
     *
     * @return ItemCollection
     */
    public function getItems();

    /**
     * Return the items relationship.
     *
     * @return HasMany
     */
    public function items();

    /**
     * Get related modifiers.
     *
     * @return ModifierCollection
     */
    public function getModifiers();

    /**
     * Return the modifiers relationship.
     *
     * @return HasMany
     */
    public function modifiers();

    /**
     * Get the billing address.
     *
     * @return AddressInterface
     */
    public function getBillingAddress();

    /**
     * Get the shipping address.
     *
     * @return AddressInterface
     */
    public function getShippingAddress();

    /**
     * Get the shipments.
     *
     * @return ShipmentCollection
     */
    public function getShipments();

    /**
     * Return the shipments relation.
     *
     * @return HasMany
     */
    public function shipments();
}
