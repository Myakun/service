<?php

use app\components\widgets\ActiveForm;
use app\modules\partner\models\user\Login;
use himiklab\yii2\recaptcha\ReCaptcha3;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var Login $model
 */

$this->title = 'Аутентификация';

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

<div class="d-grid">
    <?php echo Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
</div>

<div class="mt-4 text-center">
    <a href="<?php echo Url::to(['/partner/user/registration']) ?>">Регистрация</a>
</div>

<?php ActiveForm::end(); ?>