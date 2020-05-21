<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property int $id
 * @property string|null $nama
 * @property string|null $nomor_barcode
 * @property string|null $alamat
 * @property string|null $pengantar
 * @property string|null $tanggal_terima
 * @property string|null $pp25
 * @property string|null $pp15
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $upload_file;
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'nomor_barcode', 'tanggal_terima', 'pp25', 'pp15'], 'required'],
            [['bukti_pembayaran'], 'required', 'on' =>'finish'],
            [['alasan_retur'], 'required', 'on' =>'retur'],
            [['alamat'], 'string'],
            [['no_telephone', 'bukti_pembayaran','alasan_retur','nama', 'tanggal_setor', 'nomor_barcode', 'pengantar', 'tanggal_terima', 'pp25', 'pp15', 'jasa_pengiriman'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nomor_barcode' => 'Nomor Barcode',
            'alamat' => 'Alamat',
            'pengantar' => 'Pengantar',
            'tanggal_terima' => 'Tanggal Terima',
            'pp25' => 'Pp25',
            'pp15' => 'Pp15',
        ];
    }
}
