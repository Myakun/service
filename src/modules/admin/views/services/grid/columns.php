<?php

declare(strict_types=1);

use app\models\Service;
use app\components\widgets\grid\ActionColumn;
use yii\helpers\ArrayHelper;

$columns = [];

if (isset($useSorting) && $useSorting) {
    $columns[] = [
        'class' => \kotchuprik\sortable\grid\Column::class,
    ];
}

return ArrayHelper::merge($columns, [
    'id' => [
        'format' => 'raw',
        'header' => '#',
        'value' => function(Service $service) {
            return $this->render('grid/id', [
                'service' => $service
            ]);
        }
    ],
    'name',
    'category_id' => [
        'attribute' => 'category_id',
        'value' => function(Service $service) {
            return $service->category->name;
        }
    ],
    [
        'class' => ActionColumn::class,
        'template' => '{update} {delete}',
    ]
]);