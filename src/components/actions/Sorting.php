<?php

declare(strict_types=1);

namespace app\components\actions;

use Yii;
use yii\base\Action;
use yii\db\ActiveQuery;
use yii\web\BadRequestHttpException;

class Sorting extends Action
{
    public ActiveQuery $query;

    public string $pk = 'id';
    
    public function run()
    {
        $request = Yii::$app->getRequest();
        $offset = $request->post('offset');
        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($request->post('sorting') as $order => $id) {
                $query = clone $this->query;
                $model = $query->andWhere([$this->pk => $id])->one();
                if (null == $model) {
                    throw new BadRequestHttpException();
                }
                $model->moveToPosition($offset + $order + 1);
            }
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
        }
    }
}
