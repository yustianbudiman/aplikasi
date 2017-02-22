<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master.dokter".
 *
 * @property integer $id_dokter
 * @property string $nama_dokter
 * @property string $alamat
 * @property string $no_telepon
 * @property string $keterangan
 */
class Mdokter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.dokter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dokter'], 'required'],
            [['id_dokter'], 'integer'],
            [['nama_dokter', 'alamat', 'keterangan'], 'string', 'max' => 100],
            [['no_telepon'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dokter' => 'Id Dokter',
            'nama_dokter' => 'Nama Dokter',
            'alamat' => 'Alamat',
            'no_telepon' => 'No Telepon',
            'keterangan' => 'Keterangan',
        ];
    }
}
