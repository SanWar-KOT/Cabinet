<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Predmeti */

$this->title = 'Create Predmeti';
$this->params['breadcrumbs'][] = ['label' => 'Predmetis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="predmeti-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
