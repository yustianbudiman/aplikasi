<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rumah_sakit.rawat_jalan".
 *
 * @property integer $id_rekam
 * @property string $id_rawat_jalan
 * @property string $tanggal
 * @property string $waktu
 */
class Mrawatjalan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rumah_sakit.rawat_jalan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dokter'], 'integer'],
            [['tanggal', 'waktu'], 'safe'],
            [['id_rawat_jalan','id_rekam'], 'string', 'max' => 16],
            [['tujuan'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rekam' => 'Id Rekam',
            'id_rawat_jalan' => 'Id Rawat Jalan',
            'tanggal' => 'Tanggal',
            'waktu' => 'Waktu',
        ];
    }
}
