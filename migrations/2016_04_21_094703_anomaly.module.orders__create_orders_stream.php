<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleOrdersCreateOrdersStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
        'session'    => [
            'required' => true,
        ],
        'ip_address' => [
            'required' => true,
        ],
        'user',
    ];

}
