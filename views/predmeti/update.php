<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Predmeti */

$this->title = 'Update Predmeti: ' . ' ' . $model->predmet;
$this->params['breadcrumbs'][] = ['label' => 'Predmetis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->predmet, 'url' => ['view', 'id' => $model->predmet]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="predmeti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
