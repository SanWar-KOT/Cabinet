<?php

namespace app\controllers;

use Yii;
use app\models\Osenki;
use app\models\OsenkiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\filters\AccessRule;
/**
 * OsenkiController implements the CRUD actions for Osenki model.
 */
class OsenkiController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
             ],   
            'access' => [
                'class' => AccessControl::className(),
                 'ruleConfig' => [
			        'class' => AccessRule::className(),
			    ],                
            'rules' => [
                    [   
                        'actions' => ['view_user'],                  
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
			            'actions' => ['create','update','delete','index','view'],
			            'allow' => true,
			            'roles' => ['admin'],
			        ]
                  
                ],
            ],
            
        ];
    }

    /**
     * Lists all Osenki models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OsenkiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Osenki model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionView_user()
    {
        $user_login = Yii::$app->user->identity->login;
        $osenki = Osenki::find()->where(['login' => "$user_login"])->orderBy(['semestr'=>SORT_ASC])->All();
        
        return $this->render('view_user', [
            'model' => $this->findModelByName(),
            'osenki' => $osenki
        ]);
    }

    /**
     * Creates a new Osenki model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Osenki();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Osenki model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Osenki model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Osenki model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Osenki the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Osenki::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModelByName()
    {
        if (($model = Osenki::findOne(['login' => Yii::$app->user->identity->login])) !== null)  {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
