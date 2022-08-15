<?php

declare(strict_types=1);

/**
 * @var app\models\Order $order
 */

use kartik\widgets\StarRating;

$this->title = 'Заказ №' . $order->id;

$identity = null;
$isGuest = Yii::$app->getUser()->getIsGuest();
if (!$isGuest) {
    $identity = Yii::$app->getUser()->getIdentity();
    /**
     * @var app\models\Customer $identity
     */
}

?>

<div class="container">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Главная</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/account">Личный кабинет</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $this->title; ?></li>
        </ol>
    </nav>
</div>

<section id="order">
    <div class="container">
        <h2 class="section-title">
            <span><?php echo $this->title; ?></span>
        </h2>
        <div class="section-body">
            <?php if (!$isGuest) { ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="/order/<?php echo $order->security_code; ?>">
                            <?php echo $this->title; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/account">Заказы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/account/profile">Мой профиль</a>
                    </li>
                </ul>
            <?php } ?>
            <br>
            <?php if ($order->status == 'new') { ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Фирма</th>
                        <th>Стоимость услуги</th>
                        <th>Рейтинг фирмы</th>
                        <th></th>
                    </tr>
                    <?php foreach ($order->offers as $offer) { ?>
                        <tr>
                            <td>
                                <?php echo $offer->partner->name; ?>
                            </td>
                            <td>
                                <?php echo number_format($offer->price, 0, ',', ' '); ?> руб.
                            </td>
                            <td class="rating">
                                <?php if (null == $offer->partner->rating) { ?>
                                    Нет отзывов
                                <?php } else { ?>
                                    <?php echo StarRating::widget([
                                        'name' => 'rating' . $offer->id,
                                        'value' => $offer->partner->rating,
                                        'pluginOptions' => [
                                            'readonly' => true,
                                            'showClear' => false,
                                            'showCaption' => false,
                                        ]
                                    ]); ?>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if ($isGuest) { ?>
                                    Для выбора исполнителя необходимо <a href="/customer/login">авторизоваться</a>
                                <?php } elseif ($identity->isProfileFilled()) { ?>
                                    <button
                                            class="btn btn-success btn-sm select-partner"
                                            data-offer-id="<?php echo $offer->id; ?>"
                                            data-order-id="<?php echo $order->id; ?>">
                                        <span class="icon fas fa-spinner fa-spin"></span>
                                        <span class="text">Выбрать</span>
                                    </button>
                                <?php } else { ?>
                                    Для выбора исполнителя необходимо заполнить <a href="/account/profile">профиль</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <h3>Ваш заказ <?php echo mb_strtolower($order->getStatusNameForCustomer(), 'utf-8'); ?></h3>
                <b>Исполнитель:</b> <?php echo $order->partner->name; ?>
                <br>
                <b>Цена:</b> <?php echo number_format($order->price, 0, ',', ' '); ?> руб.
                <?php if (!empty($order->offer->description)) { ?>
                    <br>
                    <b>Примечания к услуге:</b>
                    <br>
                    <?php echo $order->offer->description; ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>