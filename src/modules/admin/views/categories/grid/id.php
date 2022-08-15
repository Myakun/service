<?php

declare(strict_types=1);

use app\models\Category;

/**
 * @var Category $category
 */

?>

<?php echo $category->id; ?>
<br>
<small class="text-muted">
    Создан
    <?php echo Yii::$app->formatter->asDatetime($category->created_at); ?>
    <?php if (null != $category->created_by) { ?>
        пользователем
        <?php echo $category->createdBy->name; ?>
    <?php } ?>
</small>