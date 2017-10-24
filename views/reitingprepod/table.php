<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FileTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Портфолио';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1> <?= $this->title ?> </h1>
<hr>
<table style="width: 100%;" border="1" cellpadding="0" cellspacing="0">
<tr>
<td align="center">
<b>ФИО преподавателя</b>
</td>
<td align="center">
<b>Балл</b>
</td>
</tr>

<?php
foreach ($model as $modelone) {
?>
<tr>
<td>
<?php
if ($modelone->rz == 0) {
?>
<a style="color:red" href="<?= $modelone->login ?>">
<?php
} else {
?>
<a style="color:green" href="<?= $modelone->login ?>">
<?php
} 
?>
<?= $modelone->login ?></a> <br>
</td>
<td align="center">
<?= $modelone->itog ?><br>
</td>
</tr>
<?php
} 
?>
</table>