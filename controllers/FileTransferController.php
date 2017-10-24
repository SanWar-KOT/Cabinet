<?php

namespace app\controllers;

use Yii;
use app\models\FileTransfer;
use app\models\Group;
use app\models\Users;
use app\models\Predmeti;
use app\models\FileTransferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\filters\AccessRule;
/**
 * FileTransferController implements the CRUD actions for FileTransfer model.
 */
class FileTransferController extends Controller
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
                        'actions' => ['list','load_list','list_portf'],                  
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
			            'actions' => ['delete','load_students','load_groups'],
			            'allow' => true,
			            'roles' => ['admin', 'teacher'],
			        ],
                    [
			            'actions' => ['create','update','index','view'],
			            'allow' => true,
			            'roles' => ['admin'],
			        ]
                  
                ],
            ]
        ];
    }

    /**
     * Lists all FileTransfer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileTransferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionList_portf()
    { 
		$strin = Yii::$app->user->identity->group."К";
        $model = FileTransfer::find()->where(['student' => Yii::$app->user->identity->login])->orderBy(['predmet'=> ASC])->All();
		$predmet = Predmeti::find()->where(['like','group',$strin])->All(); 
		
		return $this->render(
            'list_portf',
            [
                'model' => $model,
				'predmet' => $predmet,
				'strin' => $strin,
            ]
        );
    }
    
    public function actionList()
    {
                
       $model = new UploadForm();
       
       if (Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->post());
                $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                if ($model->upload()) {
                     return $this->refresh();
                   // return;
                }
       }
            
       
       if (Yii::$app->user->identity->role == 2 || Yii::$app->user->identity->role == 3) {
            $dsp = Predmeti::find()->All();          
            $groups = Group::find()->All(); 
            return $this->render('list', [
                'model' => $model,
                'groups' => $groups,
                'dsp' => $dsp
            ]);  
       }
       elseif (Yii::$app->user->identity->role == 1) {
          $dsp = Predmeti::find()->All();        
                return $this->render('list_std', [
                'model' => $model,
                'dsp' => $dsp
            ]);
        
       }
    }
    
    public function actionLoad_list($student, $dsp) 
    {
        $records = FileTransfer::find()->where(['student' => $student, 'predmet' => $dsp])->All();
        echo "<table>";
        foreach ($records as $file) {
        switch ($file->type) {
            case 1: $type_name = "КР/КП"; break;
            case 2: $type_name = "Отзыв"; break;
            case 3: $type_name = "Рецензия"; break;
        }
        ?>
        <tr>
            <td><a href="/user_files/<?php echo $file->id.$file->name?>" download><?php echo $type_name.' — '.$file->name;?></a></td>
            <?php  if (Yii::$app->user->identity->role == 2 || Yii::$app->user->identity->role == 3) {?>
              <td><a data-file="<?=$file->id?>" href="#delete_files" class="file_action delete">(удалить)</a></td>     
            <?php }?>
        </tr>   
        <?php }
    
    }
    
    public function actionLoad_students($group) 
    {
        $students = Users::find()->where(['group'=>$group])->All();
        foreach ($students as $student) {?>
                     <ul>
                        <li data-user="<?=$student->login?>" class="passive_tbl">
                           <p><span><?=$student->FIO?></span><a href="#add_files" class="add_file" data-user="<?=$student->login?>" class="file_action add_file">(добавить файл)</a></p>                         
                        </li>
                     </ul>
        <?php }	
	}
	
	public function actionLoad_groups($predmet) 
    {
        $predmets = Predmeti::find()->where(['predmet'=>$predmet])->All();
		foreach ($predmets as $predmet) {
		foreach ($predmet as $group) {
		$groupps = explode(";",$group);
        for($i = 0; $i < count($groupps)-1; $i++) {
		if ((strripos($groupps[$i],'К')) || ($predmet->predmet == 'Учебная практика') || ($predmet->predmet == 'Производственная практика') || ($predmet->predmet == 'Преддипломная практика')) {
		list($new, $new1)  = explode("К",$groupps[$i])
?>
  <li class="passive_li">
                    <span data-group="<?= $new ?>"><?= $new ?></span>
                </li>
	<?php } } } } }

    /**
     * Displays a single FileTransfer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FileTransfer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FileTransfer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FileTransfer model.
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
     * Deletes an existing FileTransfer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink('user_files/' .$model->id .$model->name);
        $model->delete();

        return $this->redirect(['list']);
    }

    /**
     * Finds the FileTransfer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FileTransfer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FileTransfer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}