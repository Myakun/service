<?php

declare(strict_types=1);

/**
 * @var app\models\Partner $partner
 */

?>

<b>Название:</b> <?php echo $partner->name; ?>
<br>
<b>Контактное лицо:</b> <?php echo $partner->contact_person; ?>
<br>
<b>Телефон:</b> <?php echo Yii::$app->formatter->formatPhone($partner->phone); ?>
<br>
<b>Email:</b> <?php echo $partner->email; ?>
