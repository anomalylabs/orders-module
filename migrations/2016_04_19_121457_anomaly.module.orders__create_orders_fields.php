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
        'str_id'     => 'anomaly.field_type.text',
        'price'      => 'anomaly.field_type.decimal',
        'ip_address' => 'anomaly.field_type.text',
        'options'    => 'anomaly.field_type.textarea',
        'properties' => 'anomaly.field_type.textarea',
        'type'       => 'anomaly.field_type.slug',
        'target'     => 'anomaly.field_type.slug',
        'value'      => 'anomaly.field_type.text',
        'number'     => 'anomaly.field_type.text',
        'quantity'   => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'order'      => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\OrdersModule\Order\OrderModel',
            ],
        ],
        'item'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\OrdersModule\Item\ItemModel',
            ],
        ],
        'entry'      => 'anomaly.field_type.polymorphic',
        'origin'     => 'anomaly.field_type.polymorphic',
    ];

}
