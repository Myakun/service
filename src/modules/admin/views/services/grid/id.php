<?php

declare(strict_types=1);

use app\models\Service;

/**
 * @var Service $service
 */

?>

<?php echo $service->id; ?>
<br>
<small class="text-muted">
    Создан
    <?php echo Yii::$app->formatter->asDatetime($service->created_at); ?>
    <?php if (null != $service->created_by) { ?>
        пользователем
        <?php echo $service->createdBy->name; ?>
    <?php } ?>
</small>