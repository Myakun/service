<?php

declare(strict_types=1);

namespace app\assets\App;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class App extends AssetBundle
{
    public $sourcePath = '@app/assets/App/src';

    public $css = [
        'css/app.css'
    ];

    public $js = [
        'js/app.js'
    ];

    public function init()
    {
        parent::init();

        $this->css[0] = $this->css[0] . '?v=' . time();
        $this->js[0] = $this->js[0] . '?v=' . time();
    }

    public $depends = [
        \yii\bootstrap5\BootstrapAsset::class,
        \yii\bootstrap5\BootstrapPluginAsset::class,
        JqueryAsset::class
    ];
}