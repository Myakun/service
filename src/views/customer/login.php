<?php

declare(strict_types=1);

use app\components\widgets\ActiveForm;
use app\models\user\Login;
use himiklab\yii2\recaptcha\ReCaptcha3;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var Login $model
 */

$this->title = 'Вход в личный кабинет';

?>

<div class="d-flex align-justify-content-md-center justify-content-center mt-5">
    <section>
        <div class="container">
            <h2 class="section-title">
                <span>Авторизация</span>
            </h2>
            <div class="section-body">
                <?php
                $form = ActiveForm::begin();

                echo $form->errorSummary($model);

                echo $form
                    ->field($model, 'email')
                    ->input('email');

                echo $form
                    ->field($model, 'password')
                    ->input('password');

                echo $form
                    ->field($model, 'reCaptcha')
                    ->widget(ReCaptcha3::class)
                    ->error(false)
                    ->label(false)
                ?>

                <div class="d-grid mt-4">
                    <?php echo Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>
</div>