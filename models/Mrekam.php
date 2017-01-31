<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rumah_sakit.rekam".
 *
 * @property integer $id
 * @property string $id_order
 * @property string $keluhan
 * @property string $resep
 * @property string $tanggal
 * @property string $id_pasien
 * @property integer $id_dokter
 */
class Mrekam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rumah_sakit.rekam';
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
            [['id_order', 'keluhan', 'resep', 'id_pasien'], 'string', 'max' => 255],
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
            'keluhan' => 'Keluhan',
            'resep' => 'Resep',
            'tanggal' => 'Tanggal',
            'id_pasien' => 'Id Pasien',
            'id_dokter' => 'Id Dokter',
        ];
    }
}
