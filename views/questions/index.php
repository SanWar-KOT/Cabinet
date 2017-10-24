<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вопрос — Ответ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-index">

    <h1>Вопрос — Ответ</h1></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<?php
	if (Yii::$app->user->identity->role == 2 || Yii::$app->user->identity->role == 3) {
?>
    <p>
        <?= Html::a('Таблица вопросов', ['admin'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php
	}
?>

    <p>
        <?= Html::a('Задать вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'emptyText' => 'Сейчас нет активных вопросов',
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->text), ['view', 'id' => $model->id]);
        },
    ]) ?>

</div>
