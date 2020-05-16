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
                'jasa_pengiriman' => 'Paketpos Cepat Internasional',
                'pp25' => 10000,
                'is_retur' => NULL,
                'pp15' => 10000,
                'bukti_pembayaran' => '1KSLSDJ323'
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
                'tanggal_setor' => NULL,
                'jasa_pengiriman' => 'EMS',
                'pp25' => 10000,
                'pp15' => 10000,
                'is_retur' => NULL,
                'alasan_retur'=>NULL

            ]
        );
        $this->insert(
            'delivery',
            [
                'nama' => 'BUDI GUNAWAN.',
                'nomor_barcode' => 'CC392688533CN',
                'alamat' => 'JL MEDAN MERDEKA 5 JEPANG',
                'pengantar' => NULL,
                'tanggal_terima' => '02/04/2019',
                'tanggal_setor' => NULL,
                'jasa_pengiriman' => 'Pos Ekspor',
                'pp25' => 10000,
                'pp15' => 10000,
                'alasan_retur' => NULL

            ]
        );
        $this->insert(
            'delivery',
            [
                'nama' => 'MIRANDA SETYA.',
                'nomor_barcode' => 'LX392688533CN',
                'alamat' => 'JL MEDAN MERDEKA 5 JEPANG',
                'pengantar' => "RAHMAT",
                'tanggal_terima' => '02/04/2019',
                'tanggal_setor' => NULL,
                'jasa_pengiriman' => 'ePacket',
                'is_retur' => true,
                'pp25' => 10000,
                'pp15' => 10000,
                'alasan_retur' => "BARANG TELAT SAMPAI"

            ]
        );

        $this->insert(
            'delivery',
            [
                'nama' => 'BENYAMIN KRISTIANTO HUDYONO.',
                'nomor_barcode' => 'CC808488921FR',
                'alamat' => 'JL AGIL KUSUMADYA GANG 3 NO 120',
                'pengantar' => NULL,
                'tanggal_terima' => '02/04/2019',
                'tanggal_setor' => NULL,
                'jasa_pengiriman' => 'Pos Ekspor',
                'is_retur' => NULL,
                'pp25' => 10000,
                'pp15' => 10000,
                'alasan_retur'=>NULL

            ]
        );

        $this->insert(
            'delivery',
            [
                'nama' => 'ANINDA SALSABILA.',
                'nomor_barcode' => 'RN494925476GB',
                'alamat' => 'MLATINOROWITO GANG 4 NO 46 03/03',
                'pengantar' => NULL,
                'tanggal_terima' => '02/04/2019',
                'tanggal_setor' => NULL,
                'jasa_pengiriman' => 'EMS',
                'is_retur' => NULL,
                'pp25' => 10000,
                'pp15' => 10000,
                'alasan_retur'=>NULL

            ]
        );

        $this->insert(
            'delivery',
            [
                'nama' => 'YEFFREY YECONIA SETIAWAN.',
                'nomor_barcode' => 'LC10000820305',
                'alamat' => 'DR LUKMONOHADI 37A ',
                'pengantar' => NULL,
                'tanggal_terima' => '02/04/2019',
                'tanggal_setor' => NULL,
                'jasa_pengiriman' => 'EMS',
                'is_retur' => NULL,
                'pp25' => 10000,
                'pp15' => 10000,
                'alasan_retur'=>NULL

            ]
        );

        $this->insert(
            'delivery',
            [
                'nama' => 'WASZUDI.',
                'nomor_barcode' => 'RY906458275SG',
                'alamat' => 'PURWOSARI SEKARAN 03/06 NO 743',
                'pengantar' => NULL,
                'tanggal_terima' => '02/04/2019',
                'tanggal_setor' => NULL,
                'jasa_pengiriman' => 'EMS',
                'is_retur' => NULL,
                'pp25' => 10000,
                'pp15' => 10000,
                'alasan_retur'=>NULL

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
