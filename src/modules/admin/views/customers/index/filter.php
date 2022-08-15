<?php

use app\components\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;

/**
 * @var \app\modules\admin\models\customer\Index $model
 */

?>

<div class="card" style="clear:both;margin-top:48px;">
    <div class="card-header <?php if ($model->filterEnabled()) { ?>bg-primary text-white<?php } ?>">
        <div class="panel-title">
            Фильтр  <?php if ($model->filterEnabled()) { ?>применен<?php } ?>
        </div>
    </div>
    <?php $form = ActiveForm::begin(['method'=>'get']); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <?php echo $form->field($model, 'name'); ?>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <?php echo $form->field($model, 'phone'); ?>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <?php echo $form->field($model, 'email'); ?>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-primary" type="submit">Применить фильтр</button>
            <?php if ($model->filterEnabled()) { ?>
                <a class="btn btn-danger" href="/admin/customers/index">Сбросить фильтр</a>
            <?php } ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


