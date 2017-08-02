<?php namespace Anomaly\OrdersModule\Order;

use Anomaly\StoreModule\Contract\AddressInterface;

/**
 * Class OrderAddress
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderAddress implements AddressInterface
{

    /**
     * The address attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Create a new CustomerAddress instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Get the first name.
     *
     * @return string
     */
    public function getFirstName()
    {
        return array_get($this->attributes, 'first_name');
    }

    /**
     * Get the last name.
     *
     * @return string
     */
    public function getLastName()
    {
        return array_get($this->attributes, 'last_name');
    }

    /**
     * Get the company.
     *
     * @return string
     */
    public function getCompany()
    {
        return array_get($this->attributes, 'company');
    }

    /**
     * Get the street address.
     *
     * @return string
     */
    public function getStreetAddress()
    {
        return array_get($this->attributes, 'street_address');
    }

    /**
     * Get the city.
     *
     * @return string
     */
    public function getCity()
    {
        return array_get($this->attributes, 'city');
    }

    /**
     * Get the state.
     *
     * @return string
     */
    public function getState()
    {
        return array_get($this->attributes, 'state');
    }

    /**
     * Get the postal code.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return array_get($this->attributes, 'postal_code');
    }

    /**
     * Get the country.
     *
     * @return string
     */
    public function getCountry()
    {
        return array_get($this->attributes, 'country');
    }
}
