<?php

declare(strict_types=1);

namespace app\components\base;

use yii\base\Model;

class FilterModel extends Model
{
    private bool $filterEnabled = false;

    protected function enableFilter()
    {
        $this->filterEnabled = true;
    }

    public function filterEnabled(): bool
    {
        return $this->filterEnabled;
    }
}