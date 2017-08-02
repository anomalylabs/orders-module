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
        'total',
        'subtotal',
        'discounts',
        'tax',
        'date',
        'number'     => [
            'unique' => true,
        ],
        'tags',
        'customer',
        'billing_address',
        'shipping_address',
        'checkout_state',
        'payment_state',
        'shipping_state',
        'quantity',
    ];
}
