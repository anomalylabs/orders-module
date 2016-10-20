<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleOrdersCreateItemsStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleOrdersCreateItemsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'items',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'order'     => [
            'required' => true,
        ],
        'entry'    => [
            'required' => true,
        ],
        'price'    => [
            'required' => true,
        ],
        'quantity' => [
            'required' => true,
        ],
        'options',
        'properties',
    ];
}
