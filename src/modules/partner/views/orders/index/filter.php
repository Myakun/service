<?php

declare(strict_types=1);

use app\components\widgets\ActiveForm;
use app\modules\partner\models\order\Index;

/**
 * @var Index $model
 */

?>

<div class="card">
    <div class="card-header <?php if ($model->filterEnabled()) { ?>bg-primary text-white<?php } ?>">
        <div class="panel-title">
            Фильтр <?php if ($model->filterEnabled()) { ?>применен<?php } ?>
        </div>
    </div>
    <?php $form = ActiveForm::begin(['method'=>'get']); ?>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <?php echo $form->field($model, 'customer'); ?>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <?php echo $form
                    ->field($model, 'status')
                    ->dropDownList(['' => ''] + Index::getStatusOptions())
                ?>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-primary" type="submit">Применить фильтр</button>
            <?php if ($model->filterEnabled()) { ?>
                <a class="btn btn-danger" href="/partner/orders/index">Сбросить фильтр</a>
            <?php } ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


