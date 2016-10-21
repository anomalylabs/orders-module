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
        'date'       => [
            'required' => true,
        ],
        'number'     => [
            'required' => true,
            'unique'   => true,
        ],
        'status'     => [
            'required' => true,
        ],
        'tags',
        'first_name',
        'last_name',
        'email',
        'company',
        'phone',
        'address1',
        'address2',
        'city',
        'postal_code',
        'country',
        'state',
    ];
}
