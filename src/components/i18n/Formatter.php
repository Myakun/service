<?php

declare(strict_types=1);

namespace app\components\i18n;

class Formatter extends \yii\i18n\Formatter
{
   public function formatPhone(string $phone): string
   {
       return preg_replace('/^(\d{3})(\d{3})(\d{2})(\d{2})$/', '+7 ($1) $2-$3-$4', $phone);
   }
}