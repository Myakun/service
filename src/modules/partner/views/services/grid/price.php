<?php

declare(strict_types=1);

/**
 * @var \app\modules\partner\models\Service $service
 */

?>

<?php if (null == $service->price) { ?>
    <button class="btn btn-success btn-sm set-price">Указать цену</button>
<?php } else { ?>
    <?php echo $service->price->price; ?>
    <br>
    <br>
    <button class="btn btn-success btn-sm set-price">Указать новую цену</button>
    <br><br>
    <button class="btn btn-danger btn-sm delete-price">Услуга более не оказывается</button>
<?php } ?>
