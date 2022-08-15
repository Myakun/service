<?php

declare(strict_types=1);

/**
 * @var app\models\Order $order
 */

?>

Здравствуйте!
<br><br>
Партнёр <?php echo $order->partner->name; ?> выполнил работу по заказу №<?php echo $order->id; ?>.
<br>
Необходимо связаться с клиентом для проверки качества предоставленной услуги.
<br><br>
Заказ: <a href="<?php echo $order->getAdminLink(); ?>"><?php echo $order->getAdminLink(); ?></a>



