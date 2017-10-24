<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Osenki */

$this->title = 'Create Osenki';
$this->params['breadcrumbs'][] = ['label' => 'Osenkis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="osenki-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
