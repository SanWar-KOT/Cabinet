<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Users".
 *
 * @property string $login
 * @property string $password
 * @property string $FIO
 * @property string $group
 * @property string $naprav
 * @property integer $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login'], 'required'],
            [['role'], 'integer'],
            [['login', 'password', 'FIO', 'group', 'naprav', 'yvedoml1', 'yvedoml2'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Login',
            'password' => 'Password',
            'FIO' => 'Fio',
            'group' => 'Group',
            'naprav' => 'Naprav',
            'role' => 'Role',
        ];
    }
    
    public function getOsenki() {
             $osenki = Osenki::find()->where(['login' => "$this->login"])->groupBy('predmet')->All();
            return $osenki;
    }
}
