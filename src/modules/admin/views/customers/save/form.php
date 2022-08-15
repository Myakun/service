<?php

declare(strict_types=1);

use app\models\Customer;
use kartik\widgets\DatePicker;

/**
 * @var \app\components\widgets\ActiveForm $form
 * @var \app\modules\admin\models\customer\Save $model
 */

echo $form->errorSummary([$model, $model->getEntity()])

?>

<div class="row">
    <div class="col-12 col-md-4 col-lg-3">
        <?php echo $form->field($model, 'name'); ?>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4 col-lg-3">
        <?php echo $form
            ->field($model, 'phone')
            ->widget(\yii\widgets\MaskedInput::class, [
                'mask' => '+7 (999) 999-99-99'
            ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-4 col-lg-3">
        <?php echo $form->field($model, 'email'); ?>
    </div>
</div>