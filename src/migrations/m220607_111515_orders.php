<?php

declare(strict_types=1);

use app\models\Order;
use yii\db\Migration;

class m220607_111515_orders extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(Order::tableName(), [
			'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'partner_id' => $this->integer()->defaultValue(null),
            'price' => $this->integer()->notNull(),
            'rating' => $this->integer()->defaultValue(null),
            'security_code' => $this->string(Order::SECURITY_CODE_LENGTH)->notNull(),
            'service_id' => $this->integer()->notNull(),
            'status' => sprintf(
                "enum('%s', '%s', '%s', '%s', '%s') NOT NULL",
                Order::STATUS_CALL,
                Order::STATUS_DONE,
                Order::STATUS_NEW,
                Order::STATUS_PROCESSING,
                Order::STATUS_QUALITY_CHECK
            ),
            'created_at' => $this->dateTime()->notNull(),
            'FOREIGN KEY (customer_id) REFERENCES customers(id)',
            'FOREIGN KEY (partner_id) REFERENCES partners(id)',
            'FOREIGN KEY (service_id) REFERENCES services(id)',
		]);

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(Order::tableName());

        return true;
	}
}
