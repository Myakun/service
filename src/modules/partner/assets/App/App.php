<?php

declare(strict_types=1);

namespace app\modules\partner\assets\App;

use yii\web\AssetBundle;

class App extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/assets/App/src';

    public $css = [
        'css/app.css'
    ];

    public function init()
    {
        parent::init();

        $this->css[0] = $this->css[0] . '?v=' . time();
    }
}