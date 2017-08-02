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
}
