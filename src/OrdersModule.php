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
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'glyphicons glyphicons-invoice';

    //protected $icon = 'fa fa-usd';

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
        'payments' => [
            'buttons' => [
                'new_payment',
            ],
        ],
        'shipments' => [
            'buttons' => [
                'new_shipment',
            ],
        ],
    ];
}
