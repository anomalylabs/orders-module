<?php namespace Anomaly\OrdersModule;

use Anomaly\OrdersModule\Item\Contract\ItemRepositoryInterface;
use Anomaly\OrdersModule\Item\ItemModel;
use Anomaly\OrdersModule\Item\ItemRepository;
use Anomaly\OrdersModule\Modifier\Contract\ModifierRepositoryInterface;
use Anomaly\OrdersModule\Modifier\ModifierModel;
use Anomaly\OrdersModule\Modifier\ModifierRepository;
use Anomaly\OrdersModule\Order\Contract\OrderRepositoryInterface;
use Anomaly\OrdersModule\Order\OrderModel;
use Anomaly\OrdersModule\Order\OrderRepository;
use Anomaly\OrdersModule\Payment\Contract\PaymentRepositoryInterface;
use Anomaly\OrdersModule\Payment\PaymentModel;
use Anomaly\OrdersModule\Payment\PaymentRepository;
use Anomaly\OrdersModule\Shipment\Contract\ShipmentRepositoryInterface;
use Anomaly\OrdersModule\Shipment\ShipmentModel;
use Anomaly\OrdersModule\Shipment\ShipmentRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Orders\OrdersItemsEntryModel;
use Anomaly\Streams\Platform\Model\Orders\OrdersModifiersEntryModel;
use Anomaly\Streams\Platform\Model\Orders\OrdersOrdersEntryModel;
use Anomaly\Streams\Platform\Model\Orders\OrdersPaymentsEntryModel;
use Anomaly\Streams\Platform\Model\Orders\OrdersShipmentsEntryModel;

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
        OrdersModulePlugin::class,
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        OrdersItemsEntryModel::class     => ItemModel::class,
        OrdersOrdersEntryModel::class    => OrderModel::class,
        OrdersPaymentsEntryModel::class  => PaymentModel::class,
        OrdersModifiersEntryModel::class => ModifierModel::class,
        OrdersShipmentsEntryModel::class => ShipmentModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        ItemRepositoryInterface::class     => ItemRepository::class,
        OrderRepositoryInterface::class    => OrderRepository::class,
        PaymentRepositoryInterface::class  => PaymentRepository::class,
        ModifierRepositoryInterface::class => ModifierRepository::class,
        ShipmentRepositoryInterface::class => ShipmentRepository::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'order'                            => [
            'as'   => 'anomaly.module.orders::orders.view',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\OrdersController@view',
        ],
        'orders/update'                    => [
            'as'   => 'anomaly.module.orders::orders.update',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\OrdersController@update',
        ],
        'orders/destroy'                   => [
            'as'   => 'anomaly.module.orders::orders.destroy',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\OrdersController@destroy',
        ],
        'orders/items/add'                 => [
            'as'   => 'anomaly.module.orders::items.add',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\ItemsController@add',
        ],
        'orders/items/update/{id}'         => [
            'as'   => 'anomaly.module.orders::items.update',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\ItemsController@update',
        ],
        'orders/items/remove/{id}'         => [
            'as'   => 'anomaly.module.orders::items.remove',
            'uses' => 'Anomaly\OrdersModule\Http\Controller\ItemsController@remove',
        ],
        'admin/orders/shipments'           => 'Anomaly\OrdersModule\Http\Controller\Admin\ShipmentsController@index',
        'admin/orders/shipments/create'    => 'Anomaly\OrdersModule\Http\Controller\Admin\ShipmentsController@create',
        'admin/orders/shipments/edit/{id}' => 'Anomaly\OrdersModule\Http\Controller\Admin\ShipmentsController@edit',
        'admin/orders/payments'            => 'Anomaly\OrdersModule\Http\Controller\Admin\PaymentsController@index',
        'admin/orders/payments/create'     => 'Anomaly\OrdersModule\Http\Controller\Admin\PaymentsController@create',
        'admin/orders/payments/edit/{id}'  => 'Anomaly\OrdersModule\Http\Controller\Admin\PaymentsController@edit',
    ];

}
