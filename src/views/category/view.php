<?php

declare(strict_types=1);

/**
 * @var \app\models\Category $category
 */

$this->title = $category->name;

?>

<div class="container">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Главная</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $category->name; ?></li>
        </ol>
    </nav>
</div>

<section id="category">
    <div class="container">
        <h2 class="section-title">
            <span><?php echo $category->name; ?></span>
        </h2>
        <div class="table-wrapper">
            <table class="table table-bordered">
                <tr>
                    <th>
                        Услуга
                    </th>
                    <th>
                        Средняя цена
                    </th>
                    <th></th>
                </tr>
                <?php foreach ($category->services as $service) { ?>
                    <tr>
                        <td>
                            <?php echo $service->name; ?>
                        </td>
                        <td>
                            <?php echo number_format($service->getAveragePrice(), 0, ',', ' '); ?>
                        <td>
                            <a href="/service/<?php echo $service->id; ?>" class="btn btn-warning btn-sm">Найти исполнителя</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>

