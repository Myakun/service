<?php

declare(strict_types=1);

use app\models\Partner;
use yii\db\Migration;

class m220602_112051_partners extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(Partner::tableName(), [
			'id' => $this->primaryKey(),
            'contact_person' => $this->string(Partner::CONTACT_PERSON_MAX_LENGTH)->notNull(),
			'email' => $this->string(255)->notNull()->unique(),
			'name' => $this->string(Partner::NAME_MAX_LENGTH)->notNull(),
			'password' => $this->string(100)->notNull(),
            'phone' => $this->string(Partner::PHONE_LENGTH)->notNull(),
            'rating' => $this->decimal(2, 1)->defaultValue(null),
            'status' => sprintf(
                "enum('%s', '%s') NOT NULL",
                Partner::STATUS_ACTIVE,
                Partner::STATUS_INACTIVE
            ),
            'created_at' => $this->dateTime()->notNull(),
		]);

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(Partner::tableName());

        return true;
	}
}
