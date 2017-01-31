<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user.t_menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $role
 * @property string $url
 * @property integer $aktif
 * @property integer $urut
 */
class Mmenu extends \yii\db\ActiveRecord
{
    public $id_otoritas;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user.t_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'role', 'aktif', 'urut'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'role' => 'Role',
            'url' => 'Url',
            'aktif' => 'Aktif',
            'urut' => 'Urut',
        ];
    }
}
