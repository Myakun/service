<?php

declare(strict_types=1);

use app\components\widgets\grid\GridView;
use yii\helpers\Html;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 * @var \app\modules\admin\models\service\Index $filterModel
 */

$this->title = 'Услуги';

$useSorting = true;

?>

<?php echo GridView::widget([
    'columns' => include(__DIR__ . '/grid/columns.php'),
    'dataProvider' => $dataProvider,
    'panel' => [
        'after' => false,
        'before' => $this->render('index/filter', [
            'model' => $filterModel
        ]),
        'heading' => $this->title,
    ],
    'rowOptions' => function ($model, $key, $index, $grid) {
        return ['data-sortable-id' => $model->id];
    },
    'options' => [
        'data' => [
            'sortable-widget' => 1,
            'sortable-url' => \yii\helpers\Url::toRoute(['sorting']),
        ]
    ],
    'summary' => false,
    'toolbar' => [
        'content' => Html::a('Создать', ['create'], ['class' => 'btn btn-success'])
    ]
]); ?>