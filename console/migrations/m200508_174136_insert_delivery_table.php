<?php

use yii\db\Migration;

/**
 * Class m200508_174136_insert_delivery_table
 */
class m200508_174136_insert_delivery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(
            'delivery',
            [
                'nama' => 'NOOR WAHYUDI',
                'nomor_barcode' => 'CP307849510MY',
                'alamat' => 'PERUM SALAM INDAH 174 KUDUS',
                'pengantar' => "ASEP MULDI",
                'tanggal_terima' => '02/01/2020',
                'tanggal_setor' => '02/03/2020',
                'pp25' => 10000,
                'pp15' => 10000,
                'blb' => 10000,
            ]
        );
        $this->insert(
            'delivery',
            [
                'nama' => 'NICANOOR B.W.',
                'nomor_barcode' => 'EA392688533CN',
                'alamat' => 'JL KUDUS JEPARA KM 4 RSB HARAPAN BUNDA',
                'pengantar' => "RIFAI",
                'tanggal_terima' => '02/01/2020',
                'tanggal_setor' => '02/03/2020',
                'pp25' => 10000,
                'pp15' => 10000,
                'blb' => 10000,
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200508_174136_insert_delivery_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200508_174136_insert_delivery_table cannot be reverted.\n";

        return false;
    }
    */
}
