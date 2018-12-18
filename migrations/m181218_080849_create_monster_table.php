<?php

use yii\db\Migration;

/**
 * Handles the creation of table `monster`.
 */
class m181218_080849_create_monster_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('monster', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(),
            'age' => $this->integer(),
            'gender' => $this->string(),
            'username' => $this->string(),
            'password' => $this->string(),
            'authKey' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('monster');
    }
}
