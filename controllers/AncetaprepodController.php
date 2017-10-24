<?php

namespace app\controllers;

use Yii;
use app\models\Ancetaprepod;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\filters\AccessRule;
/**
 * ReitingprepodController implements the CRUD actions for Ancetaprepod model.
 */
class AncetaprepodController extends Controller
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
                        'actions' => ['index', 'saves'],                  
                        'allow' => true,
			            'roles' => ['admin', 'teacher'],
			        ]
                  
                ],
            ],
        ];
    }
	
	 public function actionIndex()
    {
		$model = ($model = Ancetaprepod::find()->where(['login' => Yii::$app->user->identity->FIO])->one()) ? $model : new Ancetaprepod();
        return $this->render(
            'index',
            [
                'model' => $model
            ]
        );
	}
	
	public $saves;
	
	public function actionSaves()
    {
		$model = ($model = Ancetaprepod::find()->where(['login' => Yii::$app->user->identity->FIO])->one()) ? $model : new Ancetaprepod();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				$model->save();
				Yii::$app->session->setFlash('success','Результаты анкетирования сохранены!');
			} else {
				Yii::$app->session->setFlash('error','Ошибка! Результаты анкетирования НЕ сохранены!');
			}
        return $this->render(
            'index',
            [
                'model' => $model
            ]
        );
	}
}