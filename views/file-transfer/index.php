<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FileTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'File Transfers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-transfer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create File Transfer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'name',
            'student',
            'predmet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
