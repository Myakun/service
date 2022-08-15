<?php

declare(strict_types=1);

namespace app\modules\partner\assets\orders;

use yii\web\AssetBundle;

class Grid extends AssetBundle
{
    public $sourcePath = '@app/modules/partner/assets/orders/src';

    public $js = [
        'js/grid.js'
    ];

    public function init()
    {
        parent::init();

        $this->js[0] = $this->js[0] . '?v=' . time();
    }

    public $depends = [
        \yii\web\YiiAsset::class,
    ];
}