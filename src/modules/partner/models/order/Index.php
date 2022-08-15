<?php

declare(strict_types=1);

namespace app\modules\partner\models\order;

use app\components\base\FilterModel;
use app\models\Order;
use app\models\Partner;
use JetBrains\PhpStorm\ArrayShape;
use Yii;
use yii\db\ActiveQuery;

class Index extends FilterModel
{
    public ?string $customer = null;

    public ?string $id = null;

    public ?string $status = null;

    #[ArrayShape(['customer' => "string", 'status' => "string"])]
    public function attributeLabels(): array
    {
        $labels = (new Order())->attributeLabels();

        return [
            'customer' => 'Клиент',
            'status' => $labels['status'],
        ];
    }


    #[ArrayShape([
        Order::STATUS_DONE => "string",
        Order::STATUS_CALL => "string",
        Order::STATUS_NEW => "string",
        Order::STATUS_PROCESSING => "string",
        Order::STATUS_QUALITY_CHECK => "string"
    ])]
    public static function getStatusOptions(): array
    {
        return [
            Order::STATUS_DONE => 'Выполнен',
            Order::STATUS_CALL => 'Согласование деталей',
            Order::STATUS_NEW => 'В ожидании выбора исполнителя',
            Order::STATUS_PROCESSING => 'В работе',
            Order::STATUS_QUALITY_CHECK => 'Проверка качества',
        ];
    }

    public function getQuery(): ActiveQuery
    {
        $tableName = Order::tableName();

        /**
         * @var Partner $partner
         */
        $partner = Yii::$app->getUser()->getIdentity();
        $query = Order::find()
            ->andWhere(['partner_id' => $partner->id])
            ->with(['customer', 'service'])
            ->orderBy("{$tableName}.id DESC");

        if (null != $this->customer) {
            $this->enableFilter();
            $query->innerJoinWith(['customer' => function (ActiveQuery $query) {
                $query->andWhere(
                    ['or',
                        ['like', 'email', $this->customer],
                        ['like', 'name', $this->customer],
                        ['like', 'phone', $this->customer]
                    ]
                );
            }]);
        }

        if (null != $this->id) {
            $query->andWhere(['id' => $this->id]);
        }

        if (null != $this->status) {
            $this->enableFilter();
            $query->andWhere(["{$tableName}.status" => $this->status]);
        }

        return $query;
    }

    public function rules(): array
    {
        return [
            ['customer', 'safe'],

            ['id', 'safe'],

            ['status', 'safe'],
        ];
    }
}