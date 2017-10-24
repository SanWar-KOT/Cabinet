<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OsenkiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Osenkis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osenki-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Osenki', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'login',
            'semestr',
            'predmet',
            'resultat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
