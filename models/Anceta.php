<?php

namespace app\models;

use Yii;

class Anceta extends \yii\db\ActiveRecord
{
	 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anceta';
    }
	    
		
	public function rules()
    {
        return [
            [['login','p1' ,'p2' ,'p3' ,'p4' ,'p5' ,'p6' ,'p7' ,'p8' ,'p9' ,'p10' ,'p11' ,'p12' ,'p13' ,'p14' ,'p15', 'p16' ,'p17' ,'p18'], 'required', 'message' => 'Нужно выбрать ответ'],
            [['login'], 'string', 'max' => 100],
			[['p1' ,'p2' ,'p3' ,'p4' ,'p5' ,'p6' ,'p7' ,'p8' ,'p9' ,'p10' ,'p11' ,'p12' ,'p13' ,'p14' ,'p15', 'p15a' ,'p16' ,'p17' ,'p18'], 'string', 'max' => 100]
        ];
    }
	
	
}