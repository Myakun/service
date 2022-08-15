<?php

declare(strict_types=1);

use app\models\User;
use yii\db\Migration;

class m220602_093307_users extends Migration
{
	public function safeUp(): bool
	{
		$this->createTable(User::tableName(), [
			'id' => $this->primaryKey(),
			'email' => $this->string(255)->notNull()->unique(),
			'name' => $this->string(User::NAME_MAX_LENGTH)->notNull(),
			'password' => $this->string(100)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->defaultValue(null)
		]);

        $user = new User();
        $user->setAttributes([
            'email' => 'admin@example.com',
            'name' => 'Администратор',
            'password' => 'admin'
        ]);
        $user->save();

        return true;
	}

	public function safeDown(): bool
	{
		$this->dropTable(User::tableName());

        return true;
	}
}
