<?php

declare(strict_types=1);

/**
 * @var app\models\Customer $customer
 */

?>

<b>Имя:</b> <?php echo $customer->name; ?>
<br>
<b>Телефон:</b> <?php echo Yii::$app->formatter->formatPhone($customer->phone); ?>
<br>
<b>Email:</b> <?php echo $customer->email; ?>
