<?php

declare(strict_types=1);

namespace app\modules\partner\components\filters;

use app\models\Partner;
use Yii;
use yii\base\ActionFilter;

class StatusFilter extends ActionFilter
{
    public function beforeAction($action): bool
    {
        /**
         * @var Partner $partner
         */
        $partner = Yii::$app->getUser()->getIdentity();

        if (Partner::STATUS_INACTIVE == $partner->status) {
            Yii::$app->getResponse()->redirect(['/partner/user/registration-success']);
            Yii::$app->end();
        }

        return true;
    }
}