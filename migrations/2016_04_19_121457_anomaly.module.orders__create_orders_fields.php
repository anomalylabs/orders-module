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
        'str_id'          => 'anomaly.field_type.text',
        'ip_address'      => 'anomaly.field_type.text',
        'price'           => 'anomaly.field_type.decimal',
        'amount'          => 'anomaly.field_type.decimal',
        'total'           => 'anomaly.field_type.decimal',
        'subtotal'        => 'anomaly.field_type.decimal',
        'discounts'       => 'anomaly.field_type.decimal',
        'tax'             => 'anomaly.field_type.decimal',
        'tax_number'      => 'anomaly.field_type.text',
        'type'            => 'anomaly.field_type.slug',
        'target'          => 'anomaly.field_type.slug',
        'value'           => 'anomaly.field_type.text',
        'number'          => 'anomaly.field_type.text',
        'tags'            => 'anomaly.field_type.tags',
        'date'            => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'mode' => 'date',
            ],
        ],
        'currency'        => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'currencies',
            ],
        ],
        'state'           => 'anomaly.field_type.slug',
        'checkout_status' => 'anomaly.field_type.slug',
        'payment_status'  => 'anomaly.field_type.slug',
        'shipping_status' => 'anomaly.field_type.slug',
        'quantity'        => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'order'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => OrderModel::class,
            ],
        ],
        'item'            => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => ItemModel::class,
            ],
        ],
        'customer'        => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => CustomerModel::class,
            ],
        ],

        'first_name' => 'anomaly.field_type.text',
        'last_name'  => 'anomaly.field_type.text',
        'email'      => 'anomaly.field_type.email',
        'name'       => 'anomaly.field_type.text',
        'company'    => 'anomaly.field_type.text',
        'phone'      => 'anomaly.field_type.text',

        'billing_street_address' => 'anomaly.field_type.text',
        'billing_city'           => 'anomaly.field_type.text',
        'billing_postal_code'    => 'anomaly.field_type.text',
        'billing_country'        => 'anomaly.field_type.country',
        'billing_state'          => 'anomaly.field_type.state',

        'shipping_first_name'     => 'anomaly.field_type.text',
        'shipping_last_name'      => 'anomaly.field_type.text',
        'shipping_company'        => 'anomaly.field_type.text',
        'shipping_street_address' => 'anomaly.field_type.text',
        'shipping_city'           => 'anomaly.field_type.text',
        'shipping_postal_code'    => 'anomaly.field_type.text',
        'shipping_country'        => 'anomaly.field_type.country',
        'shipping_state'          => 'anomaly.field_type.state',

        'description' => 'anomaly.field_type.textarea',
        'entry'       => 'anomaly.field_type.polymorphic',
        'source'      => 'anomaly.field_type.polymorphic',
        'tracking'    => 'anomaly.field_type.text',
        'method'      => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => MethodModel::class,
            ],
        ],
    ];

}
