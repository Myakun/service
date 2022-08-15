<?php

declare(strict_types=1);

use app\models\Price;
use yii\db\Migration;

class m220606_190501_prices extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(Price::tableName(), [
			'id' => $this->primaryKey(),
            'partner_id' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'status' => sprintf(
                "enum('%s', '%s') NOT NULL",
                Price::STATUS_ACTIVE,
                Price::STATUS_INACTIVE
            ),
            'created_at' => $this->dateTime()->notNull(),
            'FOREIGN KEY (partner_id) REFERENCES partners(id)',
            'FOREIGN KEY (service_id) REFERENCES services(id)'
		]);

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(Price::tableName());

        return true;
	}
}
