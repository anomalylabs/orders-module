<?php

use Anomaly\CustomersModule\Address\AddressModel;
use Anomaly\CustomersModule\Customer\CustomerModel;
use Anomaly\OrdersModule\Item\ItemModel;
use Anomaly\OrdersModule\Order\OrderModel;
use Anomaly\ShippingModule\Method\MethodModel;
use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleOrderCreateOrderFields
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleOrdersCreateOrdersFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'str_id'           => 'anomaly.field_type.text',
        'ip_address'       => 'anomaly.field_type.text',
        'price'            => 'anomaly.field_type.decimal',
        'amount'           => 'anomaly.field_type.decimal',
        'total'            => 'anomaly.field_type.decimal',
        'subtotal'         => 'anomaly.field_type.decimal',
        'discounts'        => 'anomaly.field_type.decimal',
        'tax'              => 'anomaly.field_type.decimal',
        'options'          => 'anomaly.field_type.textarea',
        'properties'       => 'anomaly.field_type.textarea',
        'type'             => 'anomaly.field_type.slug',
        'target'           => 'anomaly.field_type.slug',
        'value'            => 'anomaly.field_type.text',
        'number'           => 'anomaly.field_type.text',
        'tags'             => 'anomaly.field_type.tags',
        'date'             => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'mode' => 'date',
            ],
        ],
        'currency'         => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'currencies',
            ],
        ],
        'state'            => 'anomaly.field_type.slug',
        'checkout_state'   => 'anomaly.field_type.slug',
        'payment_state'    => 'anomaly.field_type.slug',
        'shipping_state'   => 'anomaly.field_type.slug',
        'quantity'         => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'order'            => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => OrderModel::class,
            ],
        ],
        'item'             => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => ItemModel::class,
            ],
        ],
        'customer'         => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => CustomerModel::class,
            ],
        ],
        'shipping_address' => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => AddressModel::class,
            ],
        ],
        'billing_address'  => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => AddressModel::class,
            ],
        ],
        'name'             => 'anomaly.field_type.text',
        'description'      => 'anomaly.field_type.textarea',
        'purchasable'      => 'anomaly.field_type.polymorphic',
        'source'           => 'anomaly.field_type.polymorphic',
        'tracking'         => 'anomaly.field_type.text',
        'method'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => MethodModel::class,
            ],
        ],
    ];

}
