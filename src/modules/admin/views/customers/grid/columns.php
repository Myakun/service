<?php

declare(strict_types=1);

use app\models\Customer;
use app\components\widgets\grid\ActionColumn;


return [
    'id' => [
        'format' => 'raw',
        'header' => '#',
        'value' => function(Customer $customer) {
            return $this->render('grid/id', [
                'customer' => $customer
            ]);
        }
    ],
    'name',
    'phone',
    'email',
    [
        'class' => ActionColumn::class,
        'template' => '{update} {delete}',
    ]
];