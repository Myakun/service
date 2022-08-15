<?php

declare(strict_types=1);

use app\models\Customer;
use yii\db\Migration;

class m220603_190116_customers extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(Customer::tableName(), [
			'id' => $this->primaryKey(),
			'email' => $this->string(255)->notNull()->unique(),
			'name' => $this->string(Customer::NAME_MAX_LENGTH)->defaultValue(null),
			'password' => $this->string(100)->notNull(),
            'phone' => $this->string(Customer::PHONE_LENGTH)->defaultValue(null),
            'status' => sprintf(
                "enum('%s', '%s') NOT NULL",
                Customer::STATUS_ACTIVE,
                Customer::STATUS_INACTIVE
            ),
            'created_at' => $this->dateTime()->notNull(),
		]);

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(Customer::tableName());

        return true;
	}
}
