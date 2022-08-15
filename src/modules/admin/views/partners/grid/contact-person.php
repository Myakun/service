<?php

declare(strict_types=1);

use app\models\Partner;

/**
 * @var Partner $partner
 */

?>

<?php echo $partner->name; ?>
<br>
<br>
<?php echo $partner->getAttributeLabel('contact_person'); ?>: <?php echo $partner->contact_person; ?>
<br>
<?php echo $partner->getAttributeLabel('phone'); ?>: <?php echo Yii::$app->formatter->formatPhone($partner->phone); ?>
<br>
<?php echo $partner->getAttributeLabel('email'); ?>: <?php echo $partner->email; ?>
