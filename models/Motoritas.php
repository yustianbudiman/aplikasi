<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user.t_otoritas".
 *
 * @property integer $id
 * @property integer $role
 * @property integer $menu
 */
class Motoritas extends \yii\db\ActiveRecord
{
   public $name;
   public $nama_role;
   public $cari;
   public $url;
   public $aktif;
   // b.name,b.url,b.aktif
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user.t_otoritas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['id'], 'required'],
            [['id', 'role', 'menu'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'menu' => 'Menu',
        ];
    }
}
