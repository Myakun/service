<?php

declare(strict_types=1);

namespace app\modules\admin\assets\partners;

use yii\web\AssetBundle;

class Grid extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/assets/partners/src';

    public $js = [
        'js/grid.js'
    ];

    public function init()
    {
        parent::init();

        if (APP_ENV == 'dev') {
            $this->js[0] = $this->js[0] . '?v=' . time();
        }
    }

    public $depends = [
        \yii\web\YiiAsset::class,
    ];
}