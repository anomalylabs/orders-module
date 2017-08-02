<?php

return [
    'new_order_notification'       => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'filter_tags' => FILTER_VALIDATE_EMAIL,
        ],
    ],
    'order_cancelled_notification' => [
        'type'   => 'anomaly.field_type.tags',
        'config' => [
            'filter_tags' => FILTER_VALIDATE_EMAIL,
        ],
    ],
];
