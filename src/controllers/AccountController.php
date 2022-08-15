<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\Customer;
use app\models\customer\Profile;
use app\models\Order;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;

class AccountController extends Controller
{
    public function actionIndex(): Response
    {
        return new Response([
            'data' => $this->render('index', [
                'orders' => Order::find()
                    ->andWhere(['customer_id' => Yii::$app->getUser()->getId()])
                    ->with(['service'])
                    ->orderBy('created_at DESC')
                    ->all(),
            ]),
        ]);
    }

    public function actionProfile(): Response
    {
        /**
         * @var Customer $customer
         */
        $customer = Yii::$app->getUser()->getIdentity();
        $model = new Profile($customer);

        $showSuccessMessage = false;
        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            $model->save();
            $showSuccessMessage = true;
        }

        return new Response([
            'data' => $this->render('profile', [
                'model' => $model,
                'showSuccessMessage' => $showSuccessMessage,
            ]),
        ]);
    }

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ],
        ]);
    }


}