<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "napravlenie".
 *
 * @property string $naprav
 */
class Napravlenie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'napravlenie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['naprav'], 'required'],
            [['naprav'], 'string', 'max' => 255],
            [['naprav'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'naprav' => 'Naprav',
        ];
    }
}
