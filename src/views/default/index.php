<?php

declare(strict_types=1);

/**
 * @var \app\models\Category[] $categories
 */

$this->title = Yii::$app->params['siteName'] . ' - главная страница';

?>

<section id="services">
    <div class="container">
        <h2 class="section-title">
            <span>Каталог услуг</span>
        </h2>
        <div class="section-body">
            <div class="row">
                <?php foreach ($categories as $category) { ?>
                    <div class="col-12 col-sm-6 col-md-4 category-wrapper">
                        <a class="category" href="/category/<?php echo $category->id; ?>">
                            <?php echo $category->name; ?>
                        </a>
                        <ul class="services">
                            <?php $i = 0; ?>
                            <?php foreach ($category->services as $service) { ?>
                                <?php if ($i == 7) { ?>
                                    <?php  break; ?>
                                <?php } ?>
                                <li>
                                    <a class="service" href="/service/<?php echo $service->id; ?>">
                                        <?php echo $service->name; ?>
                                    </a>
                                </li>
                                <?php $i++; ?>
                            <?php } ?>
                        </ul>
                        <?php if ($i == 7) { ?>
                            <a class="show-all" href="/category/<?php echo $category->id; ?>">
                                Показать все
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

