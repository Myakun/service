<?php

declare(strict_types=1);

use app\models\Order;

app\modules\partner\assets\orders\Grid::register($this);

return [
    'id' => [
        'attribute' => 'id',
        'header' => '#',
    ],
    'service_id' => [
        'attribute' => 'service_id',
        'value' => function(Order $order) {
            return $order->service->name;
        }
    ],
    'price' => [
        'attribute' => 'price',
        'value' => function(Order $order) {
            return number_format($order->price, 0, ',', ' ');
        }
    ],
    'customer' => [
        'attribute' => 'customer_id',
        'format' => 'raw',
        'value' => function(Order $order) {
            return $this->render('grid/customer', [
                'customer' => $order->customer,
            ]);
        }
     ],
    'status' => [
        'attribute' => 'status',
        'format' => 'raw',
        'value' => function(Order $order) {
            return $this->render('grid/status', [
                'order' => $order,
            ]);
        }
    ],
];