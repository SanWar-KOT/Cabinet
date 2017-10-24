<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FileTransfer */

$this->title = 'Update File Transfer: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'File Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="file-transfer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
