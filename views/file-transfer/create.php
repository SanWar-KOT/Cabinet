<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FileTransfer */

$this->title = 'Create File Transfer';
$this->params['breadcrumbs'][] = ['label' => 'File Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-transfer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
