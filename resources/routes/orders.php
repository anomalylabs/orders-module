<?php

return [
    'admin/orders'           => 'Anomaly\OrdersModule\Http\Controller\Admin\OrdersController@index',
    'admin/orders/create'    => 'Anomaly\OrdersModule\Http\Controller\Admin\OrdersController@create',
    'admin/orders/edit/{id}' => 'Anomaly\OrdersModule\Http\Controller\Admin\OrdersController@edit',
];
