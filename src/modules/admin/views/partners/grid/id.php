<?php

declare(strict_types=1);

use app\models\Partner;

/**
 * @var Partner $partner
 */

?>

<?php echo $partner->id; ?>
<br>
<small class="text-muted">
    Создан
    <?php echo Yii::$app->formatter->asDatetime($partner->created_at); ?>
</small>