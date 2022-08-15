<?php

declare(strict_types=1);

namespace app\modules\partner\controllers;

use app\modules\partner\components\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}