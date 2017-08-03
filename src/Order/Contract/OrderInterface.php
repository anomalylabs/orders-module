<?php namespace Anomaly\OrdersModule\Order\Contract;

use Anomaly\OrdersModule\Item\ItemCollection;
use Anomaly\OrdersModule\Modifier\ModifierCollection;
use Anomaly\OrdersModule\Shipment\ShipmentCollection;
use Anomaly\StoreModule\Contract\AddressInterface;
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
     * Get the first name.
     *
     * @return string
     */
    public function getCompany();

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

    /**
     * Get the billing address.
     *
     * @return AddressInterface
     */
    public function getBillingAddress();

    /**
     * Get the billing_street_address
     *
     * @return string
     */

    public function getBillingStreetAddress();

    /**
     * Get the billing_city
     *
     * @return string
     */
    public function getBillingCity();

    /**
     * Get the billing_postal_code
     *
     * @return string
     */
    public function getBillingPostalCode();

    /**
     * Get the billing_country
     *
     * @return string
     */
    public function getBillingCountry();

    /**
     * Get the billing_state
     *
     * @return string
     */
    public function getBillingState();

    /**
     * Get the shipping address.
     *
     * @return AddressInterface
     */
    public function getShippingAddress();

    /**
     * Get the shipping_first_name
     *
     * @return string
     */

    public function getShippingFirstName();

    /**
     * Get the shipping_last_name
     *
     * @return string
     */
    public function getShippingLastName();

    /**
     * Get the shipping_company
     *
     * @return string
     */
    public function getShippingCompany();

    /**
     * Get the shipping_street_address
     *
     * @return string
     */
    public function getShippingStreetAddress();

    /**
     * Get the shipping_city
     *
     * @return string
     */
    public function getShippingCity();

    /**
     * Get the shipping_postal_code
     *
     * @return string
     */
    public function getShippingPostalCode();

    /**
     * Get the shipping_country
     *
     * @return string
     */
    public function getShippingCountry();

    /**
     * Get the shipping_state
     *
     * @return string
     */
    public function getShippingState();
}
