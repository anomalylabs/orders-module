<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleOrdersCreateOrdersStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleOrdersCreateOrdersStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'orders',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'str_id'     => [
            'required' => true,
            'unique'   => true,
        ],
        'ip_address' => [
            'required' => true,
        ],
        'state'      => [
            'required' => true,
        ],
        'currency'   => [
            'required' => true,
        ],

        'date',
        'number'     => [
            'unique' => true,
        ],

        'tax',
        'total',
        'subtotal',
        'shipping',
        'discounts',

        'tags',
        'tracking',
        'customer',
        'checkout_status',
        'payment_status',
        'shipping_status',
        'quantity',

        'first_name',
        'last_name',
        'email',

        'tax_number',
        'company',
        'groups',
        'phone',
        'notes',

        'billing_street_address',
        'billing_city',
        'billing_postal_code',
        'billing_country',
        'billing_state',

        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_street_address',
        'shipping_city',
        'shipping_postal_code',
        'shipping_country',
        'shipping_state',
    ];
}
