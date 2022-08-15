<?php

declare(strict_types=1);

namespace app\modules\partner;

use app\models\User;
use app\components\web\crud\Model;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Module extends \yii\base\Module
{
    public function init(): void
    {
        parent::init();

        $this->controllerNamespace = __NAMESPACE__ . '\\controllers';
    }
}