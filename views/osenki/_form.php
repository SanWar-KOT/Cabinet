<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Osenki */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="osenki-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'semestr')->textInput() ?>

    <?= $form->field($model, 'predmet')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'resultat')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
