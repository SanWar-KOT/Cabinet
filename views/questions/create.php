<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Questions */

$this->title = 'Create Questions';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role == 2 || Yii::$app->user->identity->role == 3) {?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php } else {?>
         <?= $this->render('short_form', [
        'model' => $model,
    ]) ?>
    <?php }?>    

</div>
