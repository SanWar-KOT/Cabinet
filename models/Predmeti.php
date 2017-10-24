<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "predmeti".
 *
 * @property string $predmet
 */
class Predmeti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'predmeti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['predmet'], 'required'],
            [['predmet'], 'string', 'max' => 255],
			[['prepod1'], 'string', 'max' => 100],
			[['prepod2'], 'string', 'max' => 100],
			[['group'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'predmet' => 'Predmet',
			'prepod1' => 'Prepod1',
			'prepod2' => 'Prepod2',
			'group' => 'Group',
        ];
    }
}
