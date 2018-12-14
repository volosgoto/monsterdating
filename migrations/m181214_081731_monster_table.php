<?php

use yii\db\Migration;

/**
 * Class m181214_081731_monster_table
 */
class m181214_081731_monster_table extends Migration
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
        $this->dropTable('monstertest');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181214_081731_monster_table cannot be reverted.\n";

        return false;
    }
    */
}
