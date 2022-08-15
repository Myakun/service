<?php

declare(strict_types=1);

namespace app\modules\admin\controllers;

use app\modules\admin\components\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}