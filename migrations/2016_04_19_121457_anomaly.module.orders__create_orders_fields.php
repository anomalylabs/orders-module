<?php

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
        'str_id'      => 'anomaly.field_type.text',
        'price'       => 'anomaly.field_type.decimal',
        'ip_address'  => 'anomaly.field_type.text',
        'options'     => 'anomaly.field_type.textarea',
        'properties'  => 'anomaly.field_type.textarea',
        'type'        => 'anomaly.field_type.slug',
        'target'      => 'anomaly.field_type.slug',
        'value'       => 'anomaly.field_type.text',
        'number'      => 'anomaly.field_type.text',
        'tags'        => 'anomaly.field_type.tags',
        'date'        => [
            'type'   => 'anomaly.field_type.datetime',
            'config' => [
                'mode' => 'date',
            ],
        ],
        'status'      => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'options' => [
                    'pending'    => 'anomaly.module.orders::field.status.option.pending',
                    'processing' => 'anomaly.module.orders::field.status.option.processing',
                    'on_hold'    => 'anomaly.module.orders::field.status.option.on_hold',
                    'completed'  => 'anomaly.module.orders::field.status.option.completed',
                    'cancelled'  => 'anomaly.module.orders::field.status.option.cancelled',
                    'refunded'   => 'anomaly.module.orders::field.status.option.refunded',
                    'failed'     => 'anomaly.module.orders::field.status.option.failed',
                ],
            ],
        ],
        'quantity'    => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'order'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\OrdersModule\Order\OrderModel',
            ],
        ],
        'item'        => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\OrdersModule\Item\ItemModel',
            ],
        ],
        'entry'       => 'anomaly.field_type.polymorphic',
        'origin'      => 'anomaly.field_type.polymorphic',
        'first_name'  => 'anomaly.field_type.text',
        'last_name'   => 'anomaly.field_type.text',
        'email'       => 'anomaly.field_type.email',
        'company'     => 'anomaly.field_type.text',
        'phone'       => 'anomaly.field_type.text',
        'address1'    => 'anomaly.field_type.text',
        'address2'    => 'anomaly.field_type.text',
        'city'        => 'anomaly.field_type.text',
        'postal_code' => 'anomaly.field_type.text',
        'country'     => 'anomaly.field_type.country',
        'state'       => 'anomaly.field_type.state',
    ];

}
