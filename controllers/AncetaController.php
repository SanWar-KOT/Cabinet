<?php

namespace app\controllers;

use Yii;
use app\models\Anceta;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\filters\AccessRule;
/**
 * ReitingprepodController implements the CRUD actions for Ancetaprepod model.
 */
class AncetaController extends Controller
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
                        'actions' => ['index', 'charts', 'saves'],                  
                        'allow' => true,
			            'roles' => ['@'],
			        ]
                  
                ],
            ],
        ];
    }
	
	 public function actionIndex()
    {
		$model = ($model = Anceta::find()->where(['login' => Yii::$app->user->identity->FIO])->one()) ? $model : new Anceta();
        return $this->render(
            'index',
            [
                'model' => $model
            ]
        );
	}
    public $saves;

    public function actionCharts()
    {
        $model = Anceta::find()->where(['p1' => 'По очной'])->all();
        $p1_1 = count($model);
        $model = Anceta::find()->where(['p1' => 'Очно-заочной'])->all();
        $p1_2 = count($model);
        $model = Anceta::find()->where(['p1' => 'Заочной'])->all();
        $p1_3 = count($model);
        $model = Anceta::find()->where(['p2' => '2 года'])->all();
        $p2_1 = count($model);
        $model = Anceta::find()->where(['p2' => '3 года'])->all();
        $p2_2 = count($model);
        $model = Anceta::find()->where(['p2' => '4 года'])->all();
        $p2_3 = count($model);
        $model = Anceta::find()->where(['p2' => '4,5 года'])->all();
        $p2_4 = count($model);

        $model = Anceta::find()->where(['p3' => 'Полностью соответствует'])->all();
        $p3_1 = count($model);
        $model = Anceta::find()->where(['p3' => 'В основном соответствует'])->all();
        $p3_2 = count($model);
        $model = Anceta::find()->where(['p3' => 'В большей мере не соответствует'])->all();
        $p3_3 = count($model);
        $model = Anceta::find()->where(['p3' => 'Не соответствует'])->all();
        $p3_4 = count($model);
        $model = Anceta::find()->where(['p3' => 'Затрудняюсь ответить'])->all();
        $p3_5 = count($model);

        $model = Anceta::find()->where(['p4' => 'Да'])->all();
        $p4_1 = count($model);
        $model = Anceta::find()->where(['p4' => 'Нет'])->all();
        $p4_2 = count($model);
        $model = Anceta::find()->where(['p4' => 'Затрудняюсь ответить'])->all();
        $p4_3 = count($model);

        $model = Anceta::find()->where(['p5' => 'Да'])->all();
        $p5_1 = count($model);
        $model = Anceta::find()->where(['p5' => 'Нет'])->all();
        $p5_2 = count($model);
        $model = Anceta::find()->where(['p5' => 'Редко'])->all();
        $p5_3 = count($model);
        $model = Anceta::find()->where(['p5' => 'Другое'])->all();
        $p5_4 = count($model);

        $model = Anceta::find()->where(['p6' => 'Лекции'])->all();
        $p6_1 = count($model);
        $model = Anceta::find()->where(['p6' => 'Практические занятия'])->all();
        $p6_2 = count($model);
        $model = Anceta::find()->where(['p6' => 'Лекции и практические занятия'])->all();
        $p6_3 = count($model);

        $model = Anceta::find()->where(['p7' => 'ВУЗом'])->all();
        $p7_1 = count($model);
        $model = Anceta::find()->where(['p7' => 'Находим сами'])->all();
        $p7_2 = count($model);
        $model = Anceta::find()->where(['p7' => 'Другое'])->all();
        $p7_3 = count($model);

        $model = Anceta::find()->where(['p8' => 'Да, всегда'])->all();
        $p8_1 = count($model);
        $model = Anceta::find()->where(['p8' => 'Нет, не всегда'])->all();
        $p8_2 = count($model);
        $model = Anceta::find()->where(['p8' => 'Затрудняюсь ответить'])->all();
        $p8_3 = count($model);
        $model = Anceta::find()->where(['p8' => 'Другое'])->all();
        $p8_4 = count($model);

        $model = Anceta::find()->where(['p9' => 'Да, всегда'])->all();
        $p9_1 = count($model);
        $model = Anceta::find()->where(['p9' => 'Не всегда получается'])->all();
        $p9_2 = count($model);
        $model = Anceta::find()->where(['p9' => 'Нет'])->all();
        $p9_3 = count($model);

        $model = Anceta::find()->where(['p10' => 'Да'])->all();
        $p10_1 = count($model);
        $model = Anceta::find()->where(['p10' => 'Нет'])->all();
        $p10_2 = count($model);

        $model = Anceta::find()->where(['p11' => 'Полностью удовлетворен'])->all();
        $p11_1 = count($model);
        $model = Anceta::find()->where(['p11' => 'Удовлетворен в большей мере'])->all();
        $p11_2 = count($model);
        $model = Anceta::find()->where(['p11' => 'Не в полной мере'])->all();
        $p11_3 = count($model);
        $model = Anceta::find()->where(['p11' => 'Не удовлетворен'])->all();
        $p11_4 = count($model);

        $model = Anceta::find()->where(['p12' => 'Да'])->all();
        $p12_1 = count($model);
        $model = Anceta::find()->where(['p12' => 'Нет'])->all();
        $p12_2 = count($model);
        $model = Anceta::find()->where(['p12' => 'Не знаю'])->all();
        $p12_3 = count($model);

        $model = Anceta::find()->where(['p13' => '2 - не удовлетворяют'])->all();
        $p13_1 = count($model);
        $model = Anceta::find()->where(['p13' => '3 - не в полной мере'])->all();
        $p13_2 = count($model);
        $model = Anceta::find()->where(['p13' => '4 - в большей степени удовлетворен'])->all();
        $p13_3 = count($model);
        $model = Anceta::find()->where(['p13' => '5 - удовлетворен полностью'])->all();
        $p13_4 = count($model);

        $model = Anceta::find()->where(['p14' => '2 - не удовлетворяют'])->all();
        $p14_1 = count($model);
        $model = Anceta::find()->where(['p14' => '3 - не в полной мере'])->all();
        $p14_2 = count($model);
        $model = Anceta::find()->where(['p14' => '4 - в большей степени удовлетворен'])->all();
        $p14_3 = count($model);
        $model = Anceta::find()->where(['p14' => '5 - удовлетворен полностью'])->all();
        $p14_4 = count($model);

        $model = Anceta::find()->where(['p15' => 'Да'])->all();
        $p15_1 = count($model);
        $model = Anceta::find()->where(['p15' => 'Нет'])->all();
        $p15_2 = count($model);
        $model = Anceta::find()->where(['p15' => 'Не знаю'])->all();
        $p15_3 = count($model);

        $model = Anceta::find()->where(['p15a' => 'Да'])->all();
        $p15a_1 = count($model);
        $model = Anceta::find()->where(['p15a' => 'Нет'])->all();
        $p15a_2 = count($model);
        $model = Anceta::find()->where(['p15a' => 'Не знаю'])->all();
        $p15a_3 = count($model);
        $model = Anceta::find()->where(['p15a' => '-'])->all();
        $p15a_4 = count($model);

        $model = Anceta::find()->where(['p16' => 'Да'])->all();
        $p16_1 = count($model);
        $model = Anceta::find()->where(['p16' => 'Нет'])->all();
        $p16_2 = count($model);
        $model = Anceta::find()->where(['p16' => 'Затрудняюсь ответить'])->all();
        $p16_3 = count($model);

        $model = Anceta::find()->where(['p17' => 'Полностью удовлетворен'])->all();
        $p17_1 = count($model);
        $model = Anceta::find()->where(['p17' => 'Частично удовлетворен'])->all();
        $p17_2 = count($model);
        $model = Anceta::find()->where(['p17' => 'Не знаю'])->all();
        $p17_3 = count($model);

        $model = Anceta::find()->where(['p18' => 'Неудовлетворительно'])->all();
        $p18_1 = count($model);
        $model = Anceta::find()->where(['p18' => 'Удовлетворительно'])->all();
        $p18_2 = count($model);
        $model = Anceta::find()->where(['p18' => 'Хорошо'])->all();
        $p18_3 = count($model);

        return $this->render(
            'charts',
            [
                'p1_1' => $p1_1,
                'p1_2' => $p1_2,
                'p1_3' => $p1_3,
                'p2_1' => $p2_1,
                'p2_2' => $p2_2,
                'p2_3' => $p2_3,
                'p2_4' => $p2_4,
                'p3_1' => $p3_1,
                'p3_2' => $p3_2,
                'p3_3' => $p3_3,
                'p3_4' => $p3_4,
                'p3_5' => $p3_5,
                'p4_1' => $p4_1,
                'p4_2' => $p4_2,
                'p4_3' => $p4_3,
                'p5_1' => $p5_1,
                'p5_2' => $p5_2,
                'p5_3' => $p5_3,
                'p5_4' => $p5_4,
                'p6_1' => $p6_1,
                'p6_2' => $p6_2,
                'p6_3' => $p6_3,
                'p7_1' => $p7_1,
                'p7_2' => $p7_2,
                'p7_3' => $p7_3,
                'p8_1' => $p8_1,
                'p8_2' => $p8_2,
                'p8_3' => $p8_3,
                'p8_4' => $p8_4,
                'p9_1' => $p9_1,
                'p9_2' => $p9_2,
                'p9_3' => $p9_3,
                'p10_1' => $p10_1,
                'p10_2' => $p10_2,
                'p11_1' => $p11_1,
                'p11_2' => $p11_2,
                'p11_3' => $p11_3,
                'p11_4' => $p11_4,
                'p12_1' => $p12_1,
                'p12_2' => $p12_2,
                'p12_3' => $p12_3,
                'p13_1' => $p13_1,
                'p13_2' => $p13_2,
                'p13_3' => $p13_3,
                'p13_4' => $p13_4,
                'p14_1' => $p14_1,
                'p14_2' => $p14_2,
                'p14_3' => $p14_3,
                'p14_4' => $p14_4,
                'p15_1' => $p15_1,
                'p15_2' => $p15_2,
                'p15_3' => $p15_3,
                'p15a_1' => $p15a_1,
                'p15a_2' => $p15a_2,
                'p15a_3' => $p15a_3,
                'p15a_4' => $p15a_4,
                'p16_1' => $p16_1,
                'p16_2' => $p16_2,
                'p16_3' => $p16_3,
                'p17_1' => $p17_1,
                'p17_2' => $p17_2,
                'p17_3' => $p17_3,
                'p18_1' => $p18_1,
                'p18_2' => $p18_2,
                'p18_3' => $p18_3,
            ]
        );
    }
	
	public function actionSaves()
    {
		$model = ($model = Anceta::find()->where(['login' => Yii::$app->user->identity->FIO])->one()) ? $model : new Anceta();
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