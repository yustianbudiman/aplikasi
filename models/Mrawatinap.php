<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rumah_sakit.rawat_inap".
 *
 * @property integer $id_rekam
 * @property string $id_rawat_inap
 * @property string $tanggal
 * @property string $waktu
 */
class Mrawatinap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rumah_sakit.rawat_inap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dokter'], 'integer'],
            [['tanggal', 'waktu'], 'safe'],
            [['id_rawat_inap','id_rekam'], 'string', 'max' => 16],
            [['kamar_bed'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rekam' => 'Id Rekam',
            'id_rawat_inap' => 'Id Rawat Inap',
            'tanggal' => 'Tanggal',
            'waktu' => 'Waktu',
        ];
    }
}
