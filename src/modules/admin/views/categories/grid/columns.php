<?php

declare(strict_types=1);

use app\models\Category;
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
        'value' => function(Category $category) {
            return $this->render('grid/id', [
                'category' => $category
            ]);
        }
    ],
    'name',
    [
        'class' => ActionColumn::class,
        'template' => '{update} {delete}',
    ]
]);