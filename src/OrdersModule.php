<?php namespace Anomaly\OrdersModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class OrdersModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrdersModule extends Module
{

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'orders' => [
            'buttons' => [
                'new_order',
            ],
        ],
    ];
}
