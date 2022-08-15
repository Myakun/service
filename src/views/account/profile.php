<?php

declare(strict_types=1);

/**
 * @var \app\models\customer\Profile $model
 * @var bool $showSuccessMessage
 */

use app\components\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Личный кабинет - профиль';

?>

<div class="container">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Главная</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $this->title; ?></li>
        </ol>
    </nav>
</div>

<section class="mb-4">
    <div class="container">
        <h2 class="section-title">
            <span><?php echo $this->title; ?></span>
        </h2>
        <div class="section-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/account">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/account/profile">Профиль</a>
                </li>
            </ul>
            <br>
            <?php if ($showSuccessMessage) { ?>
                <div class="alert alert-success">
                    Данные успешно сохранены.
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-12 col-md-4">
                    <?php
                    $form = ActiveForm::begin();

                    echo $form->errorSummary($model);

                    echo $form->field($model, 'name');

                    echo $form
                        ->field($model, 'email')
                        ->input('email');

                    echo $form
                        ->field($model, 'phone')
                        ->widget(\yii\widgets\MaskedInput::class, [
                            'mask' => '+7 (999) 999-99-99'
                        ]);

                    echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary'])
                    ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>