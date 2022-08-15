<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Category;
use app\models\Service;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class CategoryController extends Controller
{
    public function actionView(int $id): Response
    {
        $category = Category::find()
            ->andWhere([
                Category::tableName() . '.id' => $id,
                Category::tableName() . '.status' => Category::STATUS_ACTIVE
            ])
            ->with([
                'services' => function (ActiveQuery $query) {
                    $query
                        ->andWhere([Service::tableName() . '.status' => Service::STATUS_ACTIVE])
                        ->with(['prices']);
                },
            ])
            ->one();

        if (null == $category) {
            throw new NotFoundHttpException();
        }

        return new Response([
            'data' => $this->render('view', [
                'category' => $category
            ]),
        ]);
    }
}

