<?php

namespace app\models;

use Yii;

class Ancetaprepod extends \yii\db\ActiveRecord
{
	 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ancetaprepod';
    }
	    
		
	public function rules()
    {
        return [
            [['login'], 'required'],
            [['login'], 'string', 'max' => 100],
			[['p1' ,'p2' ,'p3' ,'p4' ,'p5' ,'p6' ,'p7' ,'p8' ,'p9' ,'p10' ,'p11' ,'p12' ,'p13' ,'p14' ,'p15' ,'p16'], 'string', 'max' => 100]
        ];
    }
	
	
}