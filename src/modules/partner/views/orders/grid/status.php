<?php

declare(strict_types=1);

use app\models\Order;

/**
 * @var Order $order
 */

?>

<?php echo $order->getStatusName(); ?>

<?php if (Order::STATUS_CALL == $order->status) {  ?>
    <br>
    <br>
    <button class="btn btn-success btn-sm set-next-status">Детали согласованы</button>
    &nbsp;&nbsp;
    <button class="btn btn-danger btn-sm set-status-new">Отказаться от заказа</button>
<?php } elseif (Order::STATUS_PROCESSING == $order->status) { ?>
    <br>
    <br>
    <button class="btn btn-success btn-success btn-sm set-next-status">Заказ выполнен</button>
<?php } ?>


