<?php

declare(strict_types=1);

/**
 * @var app\models\Customer $customer
 * @var app\models\Order $order
 * @var string|null $password
 * @var app\models\Service $service
 */

?>

<?php if (empty($customer->name)) { ?>
    Здравствуйте!
<?php } else { ?>
    Здравствуйте, <?php echo $customer->name; ?>.
<?php } ?>

<br><br>

Сервис <?php echo Yii::$app->params['siteName']; ?> подобрал для Вас потенциальных исполнителей для <?php echo $service->name; ?>.
<br>
Для просмотра списка перейдите по ссылке: <a href="<?php echo $order->getLink(); ?>"><?php echo $order->getLink(); ?></a>
<br><br>

<?php if (null != $password) { ?>
    Для дальнейшей работы с заказом (выбор подходящего исполнителя) Вам понадобится авторизация на сайте.
    <br>
    Ваш пароль: <?php echo $password; ?>
<?php } ?>






