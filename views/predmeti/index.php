<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PredmetiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Predmetis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predmeti-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Predmeti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'predmet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
