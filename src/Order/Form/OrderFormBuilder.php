<?php namespace Anomaly\OrdersModule\Order\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class OrderFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderFormBuilder extends FormBuilder
{

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'str_id',
        'ip_address',
    ];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'order'    => [
            'fields' => [
                'date',
                'number',
                'status',
                'tags',
            ],
        ],
        'shipping' => [
            'fields' => [
                'first_name',
                'last_name',
                'email',
                'phone',
                'company',
                'address1',
                'address2',
                'city',
                'postal_code',
                'country',
                'state',
            ],
        ],
    ];
}
