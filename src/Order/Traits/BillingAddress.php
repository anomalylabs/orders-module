<?php namespace Anomaly\OrdersModule\Order\Billing\Traits;

use Anomaly\OrdersModule\Order\OrderAddress;
use Anomaly\StoreModule\Contract\AddressInterface;

/**
 * Class BillingAddress
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
trait BillingAddress
{

    /**
     * Get the billing address.
     *
     * @return AddressInterface
     */
    public function getBillingAddress()
    {
        return new OrderAddress(
            [
                'billing_street_address' => $this->getBillingStreetAddress(),
                'billing_city'           => $this->getBillingCity(),
                'billing_state'          => $this->getBillingState(),
                'billing_postal_code'    => $this->getBillingPostalCode(),
                'billing_country'        => $this->getBillingCountry(),
            ]
        );
    }

    /**
     * Get the billing_street_address
     *
     * @return string
     */

    public function getBillingStreetAddress()
    {
        return $this->billing_street_address;
    }

    /**
     * Get the billing_city
     *
     * @return string
     */
    public function getBillingCity()
    {
        return $this->billing_city;
    }

    /**
     * Get the billing_postal_code
     *
     * @return string
     */
    public function getBillingPostalCode()
    {
        return $this->billing_postal_code;
    }

    /**
     * Get the billing_country
     *
     * @return string
     */
    public function getBillingCountry()
    {
        return $this->billing_country;
    }

    /**
     * Get the billing_state
     *
     * @return string
     */
    public function getBillingState()
    {
        return $this->billing_state;
    }
}
