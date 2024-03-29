<?php namespace Anomaly\OrdersModule\Order\Billing\Traits;

use Anomaly\OrdersModule\Order\OrderAddress;
use Anomaly\StoreModule\Contract\AddressInterface;

/**
 * Class ShippingAddress
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
trait ShippingAddress
{

    /**
     * Get the shipping address.
     *
     * @return AddressInterface
     */
    public function getShippingAddress()
    {
        return new OrderAddress(
            [
                'first_name'     => $this->getShippingFirstName(),
                'last_name'      => $this->getShippingLastName(),
                'company'        => $this->getShippingCompany(),
                'street_address' => $this->getShippingStreetAddress(),
                'city'           => $this->getShippingCity(),
                'postal_code'    => $this->getShippingPostalCode(),
                'country'        => $this->getShippingCountry(),
                'state'          => $this->getShippingState(),
            ]
        );
    }

    /**
     * Get the shipping_first_name
     *
     * @return string
     */

    public function getShippingFirstName()
    {
        return $this->shipping_first_name;
    }

    /**
     * Get the shipping_last_name
     *
     * @return string
     */
    public function getShippingLastName()
    {
        return $this->shipping_last_name;
    }

    /**
     * Get the shipping_company
     *
     * @return string
     */
    public function getShippingCompany()
    {
        return $this->shipping_company;
    }

    /**
     * Get the shipping_street_address
     *
     * @return string
     */
    public function getShippingStreetAddress()
    {
        return $this->shipping_street_address;
    }

    /**
     * Get the shipping_city
     *
     * @return string
     */
    public function getShippingCity()
    {
        return $this->shipping_city;
    }

    /**
     * Get the shipping_postal_code
     *
     * @return string
     */
    public function getShippingPostalCode()
    {
        return $this->shipping_postal_code;
    }

    /**
     * Get the shipping_country
     *
     * @return string
     */
    public function getShippingCountry()
    {
        return $this->shipping_country;
    }

    /**
     * Get the shipping_state
     *
     * @return string
     */
    public function getShippingState()
    {
        return $this->shipping_state;
    }
}
