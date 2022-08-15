<?php

declare(strict_types=1);

namespace app\modules\partner\models;

use app\models\Price;
use Yii;
use yii\db\ActiveQuery;

/**
 * @property Price|null $price
 */
class Service extends \app\models\Service
{
    public function getPrice(): ActiveQuery
    {
        return $this
            ->hasOne(Price::class, ['service_id' => 'id',])
            ->andWhere(['partner_id' => Yii::$app->getUser()->getId()]);
    }
}
