<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Category;
use app\models\Service;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\Response;

class DefaultController extends Controller
{
    public function actionIndex(): Response
    {
        return new Response([
            'data' => $this->render('index', [
                'categories' => Category::find()
                    ->andWhere([Category::tableName() . '.status' => Category::STATUS_ACTIVE])
                    ->with([
                        'services' => function (ActiveQuery $query) {
                            $query->andWhere([Service::tableName() . '.status' => Service::STATUS_ACTIVE]);
                        },
                    ])
                    ->all()
            ]),
        ]);
    }
}

