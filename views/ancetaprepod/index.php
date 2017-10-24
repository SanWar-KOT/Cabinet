<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Ancetaprepod;

/* @var $this yii\web\View */
$this->title = 'Анкета';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>
<hr />

<?php if (Yii::$app->session->hasFlash('success')): ?>
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <h3><?php echo Yii::$app->session->getFlash('success') ?></h3>
</div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <h3><?php echo Yii::$app->session->getFlash('error') ?></h3>
</div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['action'=>['ancetaprepod/saves']]); ?>
<?= $form->field($model, 'login')->hiddenInput(['value' => Yii::$app->user->identity->FIO])->label(false); ?>
<table align="center" style="width: 100%;" border="1" cellpadding="0" cellspacing="0">
<tr>
<td align=center>№ п/п</td>
<td align=center>Вопросы научно-педагогическим работникам аккредитируемой программы</td>
<td align=center style="width: 30%;">Ответы</td>
</tr>
<tr>
<td align=center>1</td>
<td align=left>Являетесь ли Вы штатным сотрудником?</td>
<td align=left> 
<?= $form->field($model, 'p1')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Внутренний совместитель' => 'Внутренний совместитель'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>2</td>
<td align=left>Имеете ли Вы ученую сепень, ученое звание?</td>
<td align=left> 
<?= $form->field($model, 'p2')->radioList(['Да. Кандидат, доктор' => 'Да. Кандидат, доктор', 'Да. Доцент, профессор' => 'Да. Доцент, профессор', 'Нет' => 'Нет'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>3</td>
<td align=left>Имеете ли Вы опыт практической работы по профилю преподаваемых дисциплин?</td>
<td align=left> 
<?= $form->field($model, 'p3')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Работаю в данное время' => 'Работаю в данное время', 'Было давно' => 'Было давно'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>4</td>
<td align=left>Какие технологии при проведении занятий вы используете?</td>
<td align=left>
<?= $form->field($model, 'p4')->radioList(['Активные' => 'Активные', 'Интерактивные' => 'Интерактивные', 'Другие' => 'Другие'])->label(false); ?>
</tr>
<tr>
<td align=center>5</td>
<td align=left>Реализуется ли в Вашей ОО учебные курсы с применением информационных технологий(ИТ)?</td>
<td align=left>
<?= $form->field($model, 'p5')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Не знаю' => 'Не знаю'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>6</td>
<td align=left>Реализуется ли в Вашей ОО электронная информационно-образовательная среда?</td>
<td align=left>
<?= $form->field($model, 'p6')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Затрудняюсь ответить' => 'Затрудняюсь ответить'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>7</td>
<td align=left>Как бы Вы оценили информационную наполненность сайта программы?</td>
<td align=left> 
<?= $form->field($model, 'p7')->radioList(['2 - не удовлетворен' => '2 - не удовлетворен', '3 - не в полной мере' => '3 - не в полной мере', '4 - в большей степени удовлетворен' => '4 - в большей степени удовлетворен', '5 - удовлетворен полностью' => '5 - удовлетворен полностью'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>8</td>
<td align=left>Есть ли у Вас возможность пройти курсы повышения квалификации, обучающие семинары, стажировки?</td>
<td align=left> 
<?= $form->field($model, 'p8')->radioList(['Да' => 'Да', 'Нет' => 'Нет'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>9</td>
<td align=left>С какой переодичностью Вы проходите повышение квалификации?</td>
<td align=left> 
<?= $form->field($model, 'p9')->radioList(['Раз в 5 лет' => 'Раз в 5 лет', 'Раз в 3 года' => 'Раз в 3 года', 'Ежегодно' => 'Ежегодно'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>10</td>
<td align=left>Являетесь ли Вы научный руководителем магистерских программ?</td>
<td align=left> 
<?= $form->field($model, 'p10')->radioList(['Да' => 'Да', 'Нет' => 'Нет'])->label(false); ?></td>
</td>
</tr>
<tr>
<td align=center>11</td>
<td align=left>Есть ли у Вас публикации в научных рецензируемых изданиях за последнии 5 лет? В каких?</td>
<td align=left> 
<?= $form->field($model, 'p11')->radioList(['Да, в научных рецензируемых изданиях' => 'Да, в научных рецензируемых изданиях',
'Да, в журналах, индексируемых в базах данных Web of Science или Scorpus' => 'Да, в журналах, индексируемых в базах данных Web of Science или Scorpus',
'Нет' => 'Нет',
'Другое' => 'Другое'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>12</td>
<td align=left>Принимаете ли Вы участие в научных семинарах, конференциях?</td>
<td align=left>
<?= $form->field($model, 'p12')->radioList(['Да' => 'Да',
'Нет' => 'Нет',
'Редко' => 'Редко',
'Не знаю' => 'Не знаю'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>13</td>
<td align=left>Всегда ли доступна Вам вся необходимая информация, касающаяся учебного процесса, внеучебных мероприятий?</td>
<td align=left> 
<?= $form->field($model, 'p13')->radioList(['Да, всегда' => 'Да, всегда',
'Нет, не всегда' => 'Нет, не всегда',
'Затрудняюсь ответить' => 'Затрудняюсь ответить',
'Другое' => 'Другое'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>14</td>
<td align=left>Удовлетворены ли Вы качеством аудиторий, помещений кафедр, учебных лабораторий и оборудования?</td>
<td align=left> 
<?= $form->field($model, 'p14')->radioList(['Полностью удовлетворен' => 'Полностью удовлетворен',
'Удовлетворен в большей мере' => 'Удовлетворен в большей мере',
'Не в полной мере' => 'Не в полной мере',
'Не удовлетворен' => 'Не удовлетворен'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>15</td>
<td align=left>Удовлетворены ли Вас качество фондов читального зала и библиотеки?</td>
<td align=left> 
<?= $form->field($model, 'p15')->radioList(['2 - не удовлетворяют' => '2 - не удовлетворяют',
'3 - не в полной мере' => '3 - не в полной мере',
'4 - в большей степени удовлетворен' => '4 - в большей степени удовлетворен',
'5 - удовлетворен полностью' => '5 - удовлетворен полностью'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>16</td>
<td align=left>Оцените, пожалуйста, условия организации образовательного процесса по программе в целом?</td>
<td align=left>
<?= $form->field($model, 'p16')->radioList(['Неудовлетворительно' => 'Неудовлетворительно',
'Удовлетворительно' => 'Удовлетворительно',
'Хорошо' => 'Хорошо',
'Отлично' => 'Отлично'])->label(false); ?>
</td>
</tr>
</table>
<p></p>
<div align = center> <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?> </div>

<?php ActiveForm::end();?>