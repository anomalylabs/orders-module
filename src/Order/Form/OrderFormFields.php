<?php namespace Anomaly\OrdersModule\Order\Form;

use Anomaly\OrdersModule\Order\OrderSequence;

/**
 * Class OrderFormFields
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OrderFormFields
{

    /**
     * Handle the fields.
     *
     * @param OrderFormBuilder $builder
     */
    public function handle(OrderFormBuilder $builder)
    {
        $builder->setFields(
            [
                '*',
                'number' => [
                    'config' => [
                        'default_value' => function (OrderSequence $sequence) {
                            return $sequence->next('P1001');
                        },
                    ],
                ],
                'date'   => [
                    'config' => [
                        'default_value' => '+5 weekdays',
                    ],
                ],
            ]
        );
    }
}
