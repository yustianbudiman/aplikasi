<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master.ruangan_bed".
 *
 * @property string $id_ruangan_bed
 * @property string $nama_ruangan
 * @property integer $id_kelas
 */
class Mruanganbed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.ruangan_bed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ruangan_bed'], 'required'],
            [['id_kelas'], 'integer'],
            [['id_ruangan_bed'], 'string', 'max' => 8],
            [['nama_ruangan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ruangan_bed' => 'Id Ruangan Bed',
            'nama_ruangan' => 'Nama Ruangan',
            'id_kelas' => 'Id Kelas',
        ];
    }
}
