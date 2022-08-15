<?php

declare(strict_types=1);

use app\components\widgets\grid\GridView;
use yii\helpers\Html;

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 * @var \app\modules\admin\models\user\Index $filterModel
 */

$this->title = 'Администраторы';

?>

<?php echo GridView::widget([
    'columns' => include(__DIR__ . '/grid/columns.php'),
    'dataProvider' => $dataProvider,
    'panel' => [
        'after' => false,
        'heading' => $this->title,
    ],
    'summary' => false,
    'toolbar' => [
        'content' => Html::a('Создать', ['create'], ['class' => 'btn btn-success'])
    ]
]); ?>