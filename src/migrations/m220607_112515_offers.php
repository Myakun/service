<?php

declare(strict_types=1);

use app\models\Offer;
use yii\db\Migration;

class m220607_112515_offers extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(Offer::tableName(), [
			'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'partner_id' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'FOREIGN KEY (order_id) REFERENCES services(id)',
            'FOREIGN KEY (partner_id) REFERENCES partners(id)',
		]);

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(Offer::tableName());

        return true;
	}
}
