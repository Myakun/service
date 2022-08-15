<?php

declare(strict_types=1);

use app\models\Category;
use app\models\Customer;
use yii\db\Migration;

class m220605_103333_categories extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(Category::tableName(), [
			'id' => $this->primaryKey(),
			'name' => $this->string(Category::NAME_MAX_LENGTH)->notNull(),
            'position' => $this->integer()->defaultValue(null),
            'status' => sprintf(
                "enum('%s', '%s') NOT NULL",
                Category::STATUS_ACTIVE,
                Category::STATUS_INACTIVE
            ),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'FOREIGN KEY (created_by) REFERENCES users(id)'
		]);

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(Category::tableName());

        return true;
	}
}
