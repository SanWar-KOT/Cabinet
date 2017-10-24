<?php

namespace app\models;

use yii\base\Model;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $student
 * @property string $predmet
 */
class FileTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
  
     
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'student', 'predmet'], 'required'],
            [['type'], 'integer'],
            [['name', 'student', 'predmet'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'name' => 'Имя файла',
            'student' => 'Студент',
            'predmet' => 'Предмет',
        ];
    }
    
    
}
