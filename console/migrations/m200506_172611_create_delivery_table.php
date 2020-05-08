<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery}}`.
 */
class m200506_172611_create_delivery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%delivery}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255),
            'nomor_barcode' => $this->string(255),
            'alamat' => $this->text(),
            'pengantar' => $this->string(255),
            'tanggal_terima' => $this->string(255),
            'tanggal_setor' => $this->string(255),
            'pp25' => $this->string(255),
            'pp15' => $this->string(255),
            'blb' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%delivery}}');
    }
}
