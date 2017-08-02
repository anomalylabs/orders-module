<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleOrdersCreateShipmentsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleOrdersCreateShipmentsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'shipments',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'order'    => [
            'required' => true,
        ],
        'method'   => [
            'required' => true,
        ],
        'tracking' => [
            'unique' => true,
        ],
    ];

}
