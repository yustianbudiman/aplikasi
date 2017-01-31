<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rumah_sakit.pasien".
 *
 * @property integer $id
 * @property string $id_order
 * @property string $tanggal
 * @property string $nama
 * @property string $alamat
 * @property integer $id_dokter
 */
class Mpasien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rumah_sakit.pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_dokter'], 'integer'],
            [['tanggal'], 'safe'],
            [['id_order', 'nama', 'alamat'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'tanggal' => 'Tanggal',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'id_dokter' => 'Id Dokter',
        ];
    }
}
