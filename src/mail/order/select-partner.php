<?php

declare(strict_types=1);

/**
 * @var app\models\Order $order
 * @var app\models\Service $service
 */

?>

Здравствуйте!
<br><br>
Вас выбрали исполнителем для оказания услуги <?php echo $service->name; ?>.
<br><br>
Детали заказа: <a href="<?php echo $order->getPartnerLink(); ?>"><?php echo $order->getPartnerLink(); ?></a>



