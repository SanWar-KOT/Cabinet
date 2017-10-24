<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\Reitingprepod;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\filters\AccessRule;
/** 
 * ReitingprepodController implements the CRUD actions for Reitingprepod model.
 */
class ReitingprepodController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                 'ruleConfig' => [
			        'class' => AccessRule::className(),
			    ],                
            'rules' => [
                    [   
                        'actions' => ['index', 'seach', 'saves', 'indexzav', 'listkaf', 'listyears', 'seachzav', 'saveszav', 'table'],                  
                        'allow' => true,
                        'roles' => ['admin', 'teacher']
                    ],                  
                ],
            ]
        ];
    }


	public function actionIndexzav()
    {
		$model = new Reitingprepod();
		return $this->render(
            'indexzav',
            [
                'model' => $model
            ]
        );
	}
	
	public function actionListkaf()
    {
			echo "<option value= ></option>";
            echo "<option value=2016/2017>2016/2017</option>";
			echo "<option value=2017/2018>2017/2018</option>";
	}
	
	public function actionListyears($kafedra, $years)
    {
		echo "<option value= ></option>";
		$models = Reitingprepod::find()->where(['kafedra' => $kafedra, 'yearrs' => $years])->all();
		foreach($models as $model){
                echo "<option value='".$model->login."'>".$model->login."</option>";
            }
	}
	
	public function actionIndex()
    {
		$model = new Reitingprepod();
		return $this->render(
            'index',
            [
                'model' => $model
            ]
        );
	}
	
	public function actionTable()
    {
		$model = Reitingprepod::find()->All();
		return $this->render(
            'table',
            [
                'model' => $model
            ]
        );
	}

	public function actionSeachzav()
    {
		$model = new Reitingprepod();
		$model->load(Yii::$app->request->post());
		$model = Reitingprepod::find()->where(['login' => $model->login, 'kafedra' => $model->kafedra, 'yearrs' => $model->yearrs])->one();
        return $this->render(
            'indexzav',
            [
                'model' => $model,
				'years' => $model->yearrs,
				'logins' => $model->login,
				'kafedra' => $model->kafedra
            ]
        );
    }	
	
	public function actionSaveszav()
    {
		
		$test =false;
		$model = new Reitingprepod();
		$model->load(Yii::$app->request->post());
		$model = Reitingprepod::find()->where(['login' => $model->login, 'kafedra' => $model->kafedra, 'yearrs' => $model->yearrs])->one();		
        if($model->load(Yii::$app->request->post()) && $model->validate()){
				$model->save();
		}
        return $this->render(
            'indexzav',
            [
                'model' => $model,
				'years' => $model-> yearrs,
				'logins' => $model-> login,
				'kafedra' => $model-> kafedra
            ]
        );
    }
    
	public function actionSeach()
    {
		$model = new Reitingprepod();
		$model->load(Yii::$app->request->post());
		$model = ($model = Reitingprepod::find()->where(['login' => $model->login, 'kafedra' => $model->kafedra, 'yearrs' => $model->yearrs])->one()) ? $model : new Reitingprepod();
        return $this->render(
            'index',
            [
                'model' => $model
            ]
        );
    }

	public function actionSaves()
    {
		$model = new Reitingprepod();
		$model->load(Yii::$app->request->post());
		$model = ($model = Reitingprepod::find()->where(['login' => $model->login, 'kafedra' => $model->kafedra, 'yearrs' => $model->yearrs])->one()) ? $model : new Reitingprepod();		
        if($model->load(Yii::$app->request->post()) && $model->validate()):
				$model->save();
                Yii::$app->session->setFlash('success', 'Изменения сохранены');
            else:
                Yii::error('Ошибка записи. Изменения не сохранены');
				Yii::$app->session->setFlash('error', 'Изменения не сохранены');
            endif;
        return $this->render(
            'index',
            [
                'model' => $model
            ]
        );
    }
	
	
}