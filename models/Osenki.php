<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "osenki".
 *
 * @property integer $id
 * @property string $login
 * @property integer $semestr
 * @property string $predmet
 * @property string $resultat
 */
class Osenki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'osenki';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semestr'], 'integer'],
            [['login', 'predmet', 'resultat'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'semestr' => 'Semestr',
            'predmet' => 'Predmet',
            'resultat' => 'Resultat',
        ];
    }
}
