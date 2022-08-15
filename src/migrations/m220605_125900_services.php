<?php

declare(strict_types=1);

use app\models\Category;
use app\models\Customer;
use app\models\Service;
use yii\db\Migration;

class m220605_125900_services extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(Service::tableName(), [
			'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'description' => $this->text(),
			'name' => $this->string(Service::NAME_MAX_LENGTH)->notNull(),
            'position' => $this->integer()->defaultValue(null),
            'status' => sprintf(
                "enum('%s', '%s') NOT NULL",
                Category::STATUS_ACTIVE,
                Category::STATUS_INACTIVE
            ),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'FOREIGN KEY (category_id) REFERENCES categories(id)',
            'FOREIGN KEY (created_by) REFERENCES users(id)'
		]);

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(Service::tableName());

        return true;
	}
}
