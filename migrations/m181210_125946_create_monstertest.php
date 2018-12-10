<?php

use yii\db\Migration;

/**
 * Class m181210_125946_create_monstertest
 */
class m181210_125946_create_monstertest extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('monstertest', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(),
            'age' => $this->integer(),
            'gender' => $this->string()

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
        echo "m181210_125946_create_monstertest cannot be reverted.\n";

        return false;
    }
    */
}
