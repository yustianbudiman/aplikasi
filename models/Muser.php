<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user.t_user".
 *
 * @property integer $id
 * @property string $nik
 * @property integer $status
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property string $nama
 */
class Muser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user.t_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'status', 'role'], 'integer'],
            [['nik'], 'string', 'max' => 20],
            [['username'], 'string', 'max' => 25],
            [['password'], 'string', 'max' => 50],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'status' => 'Status',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'nama' => 'Nama',
        ];
    }
}
