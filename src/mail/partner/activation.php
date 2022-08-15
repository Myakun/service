<?php

declare(strict_types=1);

/**
 * @var app\models\Partner $partner
 * @var string $password
 */

$link = \yii\helpers\Url::to(['/partner'], true);

?>

Здравствуйте!
<br><br>
Администратор сайта <?php echo Yii::$app->params['siteName']; ?> активировал Ваш аккаунт партнёра.
<br><br>
Личный кабинет партнёра: <a href="<?php echo $link; ?>"><?php echo $link; ?></a>
<br><br>
Пароль для входа: <?php echo $password; ?>


