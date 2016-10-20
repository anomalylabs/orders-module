<?php namespace Anomaly\OrdersModule\Order\Form;

use Anomaly\OrdersModule\Order\OrderSequence;

class OrderFormFields
{

    public function handle(OrderFormBuilder $builder)
    {
        $builder->setFields([
            '*',
            'number' => [
                'config' => [
                    'default_value' => function(OrderSequence $sequence) {
                        return $sequence->next('P1001');
                    }
                ]
            ]
        ]);
    }
}
