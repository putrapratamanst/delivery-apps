<?php

use yii\db\Migration;

/**
 * Class m200508_014755_insert_user_table
 */
class m200508_014755_insert_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user',
        [
            'username' => 'operator',
            'auth_key' => '0r1jiVTr5hQ67S00zl0rKrPL39iYFzM5',
            'password_hash' => '$2y$13$GSkwwxEvinJzpeFTRRhYl.0gcH/ZR8.alET9HxZfRIMDsknNXsEXe',
            'password_reset_token' => NULL,
            'email' => 'operator@operator.com',
            'status' => 10,
            'role' => 1,
            'created_at' => 1588787597,
            'updated_at' => 1588787597,
        ]);
        $this->insert('user',
        [
            'username' => 'manager',
            'auth_key' => '0r1jiVTr5hQ67S00zl0rKrPL39iYFzM5',
            'password_hash' => '$2y$13$GSkwwxEvinJzpeFTRRhYl.0gcH/ZR8.alET9HxZfRIMDsknNXsEXe',
            'password_reset_token' => NULL,
            'email' => 'manager@manager.com',
            'status' => 10,
            'role' => 2,
            'created_at' => 1588787597,
            'updated_at' => 1588787597,
        ]);
        $this->insert('user',
        [
            'username' => 'customer_service',
            'auth_key' => '0r1jiVTr5hQ67S00zl0rKrPL39iYFzM5',
            'password_hash' => '$2y$13$GSkwwxEvinJzpeFTRRhYl.0gcH/ZR8.alET9HxZfRIMDsknNXsEXe',
            'password_reset_token' => NULL,
            'email' => 'cs@cs.com',
            'status' => 10,
            'role' => 3,
            'created_at' => 1588787597,
            'updated_at' => 1588787597,
        ]);
        $this->insert('user',
        [
            'username' => 'kepala_kantor',
            'auth_key' => '0r1jiVTr5hQ67S00zl0rKrPL39iYFzM5',
            'password_hash' => '$2y$13$GSkwwxEvinJzpeFTRRhYl.0gcH/ZR8.alET9HxZfRIMDsknNXsEXe',
            'password_reset_token' => NULL,
            'email' => 'kepala@kantor.com',
            'status' => 10,
            'role' => 4,
            'created_at' => 1588787597,
            'updated_at' => 1588787597,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200508_014755_insert_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200508_014755_insert_user_table cannot be reverted.\n";

        return false;
    }
    */
}
