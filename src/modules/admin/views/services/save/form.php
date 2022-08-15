<?php

declare(strict_types=1);

/**
 * @var \app\components\widgets\ActiveForm $form
 * @var \app\modules\admin\models\service\Save $model
 */

use kartik\widgets\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;

echo $form->errorSummary([$model, $model->getEntity()])

?>

<div class="row">
    <div class="col-12 col-md-4">
        <?php echo $form->field($model, 'name'); ?>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4">
        <?php echo $form
            ->field($model, 'categoryId')
            ->widget(Select2::class, [
                'initValueText' => $model->getCategoryIdDisplayName(),
                'pluginOptions' => [
                    'ajax' => [
                        'url' => Url::to(['/admin/categories/autocomplete']),
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {query:params.term}; }')
                    ],
                    'minimumInputLength' => 2
                ]]); ?>
    </div>
</div>



