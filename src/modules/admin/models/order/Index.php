<?php

declare(strict_types=1);

namespace app\modules\admin\models\order;

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

    public ?string $partner = null;

    public ?string $status = null;

    #[ArrayShape(['customer' => "string", 'partner' => "string", 'status' => "string"])]
    public function attributeLabels(): array
    {
        $labels = (new Order())->attributeLabels();

        return [
            'customer' => $labels['customer_id'],
            'partner' => $labels['partner_id'],
            'status' => $labels['status'],
        ];
    }

    #[ArrayShape([
        Order::STATUS_DONE => "string",
        Order::STATUS_CALL => "string",
        Order::STATUS_PROCESSING => "string",
        Order::STATUS_QUALITY_CHECK => "string"
    ])]
    public static function getStatusOptions(): array
    {
        return [
            Order::STATUS_DONE => 'Выполнен',
            Order::STATUS_CALL => 'Согласование деталей',
            Order::STATUS_PROCESSING => 'В работе',
            Order::STATUS_QUALITY_CHECK => 'Проверка качества',
        ];
    }

    public function getQuery(): ActiveQuery
    {
        $tableName = Order::tableName();

        $query = Order::find()
            ->with(['customer', 'partner', 'service'])
            ->orderBy("{$tableName}.id DESC");

        if (null != $this->customer) {
            $this->enableFilter();
            $query->innerJoinWith(['customer' => function (ActiveQuery $query) {
                $query->andWhere(
                    ['or',
                        ['like', 'customers.email', $this->customer],
                        ['like', 'customers.name', $this->customer],
                        ['like', 'customers.phone', $this->customer]
                    ]
                );
            }]);
        }

        if (null != $this->id) {
            $query->andWhere(['id' => $this->id]);
        }

        if (null != $this->partner) {
            $this->enableFilter();
            $query->innerJoinWith(['partner' => function (ActiveQuery $query) {
                $query->andWhere(
                    ['or',
                        ['like', 'partners.contact_person', $this->partner],
                        ['like', 'partners.email', $this->partner],
                        ['like', 'partners.name', $this->partner],
                        ['like', 'partners.phone', $this->partner]
                    ]
                );
            }]);
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

            ['partner', 'safe'],

            ['status', 'safe'],
        ];
    }
}