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
<b>Наименование дисциплина</b>
</td>
<td align="center">
<b>Работа</b>
</td>
<td align="center">
<b>Отзыв / Рецензия</b>
</td>
</tr>

<?php
foreach ($predmet as $predmetone) {
?>
<tr>
<td>
<?= $predmetone->predmet ?>
</td>
<td align="center">
<?php 
foreach ($model as $modelone) {
if ($modelone->predmet == $predmetone->predmet) {
if ($modelone->type == 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Курсовая работа</a> <br><?php }}} ?>
</td>
<td align="center">
<?php
foreach ($model as $modelone) {
if ($modelone->predmet == $predmetone->predmet) {
if ($modelone->type != 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Рецензия</a> <br><?php }}} ?>
</td>
</tr>
<?php
} //добавить практики
?>
<tr>
<td>
Учебная практика
</td>
<td align="center">
<?php 
foreach ($model as $modelone) {
if ($modelone->predmet == 'Учебная практика') {
if ($modelone->type == 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Учебная практика</a> <br><?php }}} ?>
</td>
<td align="center">
<?php
foreach ($model as $modelone) {
if ($modelone->predmet == 'Учебная практика') {
if ($modelone->type != 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Рецензия</a> <br><?php }}} ?>
</td>
</tr>
<tr>
<td>
Производственная практика
</td>
<td align="center">
<?php 
foreach ($model as $modelone) {
if ($modelone->predmet == 'Производственная практика') {
if ($modelone->type == 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Производственная практика</a> <br><?php }}} ?>
</td>
<td align="center">
<?php
foreach ($model as $modelone) {
if ($modelone->predmet == 'Производственная практика') {
if ($modelone->type != 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Рецензия</a> <br><?php }}} ?>
</td>
</tr>
<tr>
<td>
Преддипломная практика
</td>
<td align="center">
<?php 
foreach ($model as $modelone) {
if ($modelone->predmet == 'Преддипломная практика') {
if ($modelone->type == 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Преддипломная практика</a> <br><?php }}} ?>
</td>
<td align="center">
<?php
foreach ($model as $modelone) {
if ($modelone->predmet == 'Преддипломная практика') {
if ($modelone->type != 1) {?>
<a href="/user_files/<?= $modelone->id ?><?= $modelone->name ?>">Рецензия</a> <br><?php }}} ?>
</td>
</tr>
</table>