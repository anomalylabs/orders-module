<?php namespace Anomaly\OrdersModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class OrdersModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\OrdersModule
 */
class OrdersModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\OrdersModule\OrdersModulePlugin',
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'order'                    => [
            'as'   => 'anomaly.module.orders::orders.view',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\OrdersController@view',
        ],
        'orders/update'            => [
            'as'   => 'anomaly.module.orders::orders.update',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\OrdersController@update',
        ],
        'orders/destroy'           => [
            'as'   => 'anomaly.module.orders::orders.destroy',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\OrdersController@destroy',
        ],
        'orders/items/add'         => [
            'as'   => 'anomaly.module.orders::items.add',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\ItemsController@add',
        ],
        'orders/items/update/{id}' => [
            'as'   => 'anomaly.module.orders::items.update',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\ItemsController@update',
        ],
        'orders/items/remove/{id}' => [
            'as'   => 'anomaly.module.orders::items.remove',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\ItemsController@remove',
        ],
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Orders\OrdersOrdersEntryModel'     => 'Anomaly\OrdersModule\Order\OrderModel',
        'Anomaly\Streams\Platform\Model\Orders\OrdersItemsEntryModel'     => 'Anomaly\OrdersModule\Item\ItemModel',
        'Anomaly\Streams\Platform\Model\Orders\OrdersModifiersEntryModel' => 'Anomaly\OrdersModule\Modifier\ModifierModel',
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\OrdersModule\Order\Contract\OrderRepositoryInterface'         => 'Anomaly\OrdersModule\Order\OrderRepository',
        'Anomaly\OrdersModule\Item\Contract\ItemRepositoryInterface'         => 'Anomaly\OrdersModule\Item\ItemRepository',
        'Anomaly\OrdersModule\Modifier\Contract\ModifierRepositoryInterface' => 'Anomaly\OrdersModule\Modifier\ModifierRepository',
    ];

}
