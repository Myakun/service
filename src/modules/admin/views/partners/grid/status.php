<?php

declare(strict_types=1);

use app\models\Partner;

/**
 * @var Partner $partner
 */

?>

<?php echo Partner::getStatusOptions()[$partner->status]; ?>
<?php if (Partner::STATUS_INACTIVE == $partner->status) {  ?>
    <br>
    <br>
    <button class="btn btn-primary btn-sm activate-partner">Активировать</button>
<?php } else { ?>
    <br>
    <br>
    <button class="btn btn-primary btn-danger btn-sm deactivate-partner">Деактивировать</button>
<?php } ?>


