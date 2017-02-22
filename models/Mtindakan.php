<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rumah_sakit.tindakan".
 *
 * @property integer $id
 * @property string $id_rekam
 * @property string $tanggal
 * @property integer $id_tindakan
 * @property double $harga_satuan
 * @property integer $jumlah
 * @property double $total_harga
 */
class Mtindakan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rumah_sakit.tindakan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['id_tindakan', 'jumlah'], 'integer'],
            [['harga_satuan', 'total_harga'], 'number'],
            [['id_rekam'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_rekam' => 'Id Rekam',
            'tanggal' => 'Tanggal',
            'id_tindakan' => 'Id Tindakan',
            'harga_satuan' => 'Harga Satuan',
            'jumlah' => 'Jumlah',
            'total_harga' => 'Total Harga',
        ];
    }
}
