<?php

declare(strict_types=1);

namespace app\modules\admin\models\category;

use app\models\Category;
use yii\base\Model;
use yii\db\ActiveQuery;

class Index extends Model
{
    public function getQuery(): ActiveQuery
    {
        $tableName = Category::tableName();

        $query = Category::find()
            ->with(['createdBy'])
            ->orderBy("{$tableName}.position ASC");

        return $query;
    }
}