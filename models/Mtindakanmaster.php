<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master.tindakan_master".
 *
 * @property integer $id_tindakan
 * @property string $nama_tindakan
 * @property double $harga
 */
class Mtindakanmaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master.tindakan_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['harga'], 'number'],
            [['nama_tindakan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tindakan' => 'Id Tindakan',
            'nama_tindakan' => 'Nama Tindakan',
            'harga' => 'Harga',
        ];
    }
}
