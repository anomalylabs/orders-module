<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleOrdersCreatePaymentsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleOrdersCreatePaymentsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'payments',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'amount' => [
            'required' => true,
        ],
        'state'  => [
            'required' => true,
        ],
        'order'  => [
            'required' => true,
        ],
    ];

}
