<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Reitingprepod;

/* @var $this yii\web\View */
$this->title = 'Лист рейтинговой оценки работы преподавателя';
$this->params['breadcrumbs'][] = $this->title;
if ($kafedra == null) { $kafedra = '' ;}
if ($years == null) {$years = '';}
if ($logins == null) {$login = '';}
?>

<h1><?= Html::encode($this->title)?> </h1>
 <?php Pjax::begin(); ?>
<?php $form = ActiveForm::begin(['id' => 'NewForms', 'options' => ['data-pjax' => true], 'action'=>['reitingprepod/seachzav']]); ?>
<h3><?= $md5 ?></h3>
<div class="site-about">
<hr />
<?php
echo $form->field($model, 'kafedra')->dropDownList(['Экономики и управления' => 'Экономики и управления', 'Профсоюзного движения, гуманитарных и социально-экономических дисциплин' => 'Профсоюзного движения, гуманитарных и социально-экономических дисциплин'], 
             [  'prompt'=>'',
				'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('reitingprepod/listkaf?kafedra=').'"+$(this).val(), function( data ) {
                  $( "select#reitingprepod-yearrs" ).html( data );
                });
            '])->label('Кафедра: ')
?> 

<?php
echo $form->field($model, 'yearrs')->dropDownList([], 
             [  'prompt'=>'',
				'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('reitingprepod/listyears?kafedra=').'"+document.getElementsByName("Reitingprepod'.'[kafedra]'.'")[0].value+"&years="+$(this).val(), function( data ) {
                  $( "select#reitingprepod-login" ).html( data );
                });
            '])->label('Учебный год: ');	
    if ($years != null) {
	$text = "<option value=".$model->yearrs.">".$model->yearrs."</option>"; 
	echo("<script>$('select#reitingprepod-yearrs').html('$text')</script>");
	}
?> 
<?= $form->field($model, 'login')->dropDownList([],['promt' => $model->login])->label('Преподаватель: ') ?> 
<?php if ($logins != null) {
	$text = "<option value=".$model->login.">".$model->login."</option>"; 
	echo("<script>$('select#reitingprepod-login').html('$text')</script>");
	} ?>


<div align=center><?= Html::submitButton('Показать', ['class' => 'btn btn-primary', 'id' => 'seach-button']) ?></div>

<div id="kostil"> 
<p><?= $form->field($model, 'stavka')->textInput()->label('Размер занимаемой ставки: '); ?> </p>
<script type='text/javascript'>
$('#reitingprepod-stavka').keyup(function(){
document.getElementById('stavkaa').innerHTML = document.getElementsByName('Reitingprepod[stavka]')[0].value;
val_itog();
});
</script>
<p><?= $form->field($model, 'audit_nagruz')->textInput()->label('Количество часов аудиторной нагрузки(n): '); ?> </p>
<script type='text/javascript'>
$('#reitingprepod-audit_nagruz').keyup(function(){
document.getElementById('audit_nagruzka').innerHTML = document.getElementsByName('Reitingprepod[audit_nagruz]')[0].value;
val_itog();
});
</script>
<table align="center" style="width: 100%;" border="1" cellpadding="0" cellspacing="0">
<tr>
<td align=center>№ п/п</td>
<td align=center>Наименование показателя</td>
<td align=center>Еденица измерения</td>
<td align=center>Значение показателя за единицу</td>
<td align=center>Кол-во единиц</td>
<td align=center>Общее кол-во баллов</td>
</tr>
<tr>
<td align=center colspan=6><big><b>1. ПРОФЕССИОНАЛЬНЫЙ ПОТЕНЦИАЛ</b></big></td>
</tr>
<tr>
<td align=center>1.1</td>
<td align=left>Наличие ученой степени: доктор наук / кандидат наук</td>
<td align=center>-</td>
<td align=center>10 / 5</td>
<td align=center>-</td>
<td><?= $form->field($model, 'punkt11')->textInput()->label(''); ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt11').keyup(function(){
	val_reitingp();
	val_itog();
});
</script>
</tr>
<tr>
<td align=center>1.2</td>
<td align=left>Наличие ученого / почетного звания: профессор / доцент / отраслевые почетные вазния</td>
<td align=center>-</td>
<td align=center>10 / 5 / 15</td>
<td align=center>-</td>
<td><?= $form->field($model, 'punkt12')->textInput()->label(''); ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt12').keyup(function(){
	val_reitingp();
	val_itog();
});
</script>
</tr>
<tr>
<td align=center>1.3</td>
<td align=left>Стаж работы в высших учебных заведениях: 3-10 лет / 10-20 лет / более 20 лет</td>
<td align=center>-</td>
<td align=center>3 / 5 / 15</td>
<td align=center>-</td>
 <td><?= $form->field($model, 'punkt13')->textInput()->label(''); ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt13').keyup(function(){
	val_reitingp();
	val_itog();
});
</script>
 </tr>
<tr>
<td align=center>1.4</td>
<td align=left>Занимаемая должность: профессор / доцент / старший преподаватель / преподаватель</td>
<td align=center>-</td>
<td align=center>7 / 4 / 2 / 1</td>
<td align=center>-</td>
<td><?= $form->field($model, 'punkt14')->textInput()->label(''); ?></td>
 <script type='text/javascript'>
$('#reitingprepod-punkt14').keyup(function(){
	val_reitingp();
	val_itog();
});
</script>
</tr>
<tr>
<td align=center>1.5</td>
<td align=left>Членство в жюри выставок, конкурсов, олимпиад и др.</td>
<td align=center> 1 мероприятие </td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt15')->textInput()->label(''); ?></td>
<td align=center name="punkt15a" id="punkt15a"><?= Html::encode($model->punkt15)*2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt15').keyup(function(){
document.getElementsByName('punkt15a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt15]')[0].value * 2;
val_reitingp();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>1.6</td>
<td align=left>Членство во всероссийских и региональных советах, объединениях и др.</td>
<td align=center> 1 совет, объединение</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt16')->textInput()->label(''); ?></td>
<td align=center name="punkt16a" id="punkt16a"><?= Html::encode($model->punkt16)*2 ?></td>
 <script type='text/javascript'>
$('#reitingprepod-punkt16').keyup(function(){
document.getElementsByName('punkt16a')[0].innerHTML = Number(document.getElementsByName('Reitingprepod[punkt16]')[0].value * 2);
val_reitingp();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>1.7</td>
<td align=left>Председатель профкома сотрудников филиала / член профкома сотрудников филиала</td>
<td align=center>-</td>
<td align=center> 3 / 2 </td>
<td align=center>-</td>
<td><?= $form->field($model, 'punkt17')->textInput()->label(''); ?></td>
 <script type='text/javascript'>
$('#reitingprepod-punkt17').keyup(function(){
	val_reitingp();
	val_itog();
});
</script>
</tr>
<tr>
<td align=right colspan=5><b>Итого по рейтингу "П":</b></td>
<td><?= $form->field($model, 'reitingP')->textInput()->label(''); ?></td>
 <script type='text/javascript'>
$('#reitingprepod-reitingp').keyup(function(){
	val_reitingp();
	val_itog();
});

function val_reitingp() {
document.getElementsByName('Reitingprepod[reitingP]')[0].value = Number(document.getElementsByName('Reitingprepod[punkt11]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt12]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt13]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt14]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt15]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt16]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt17]')[0].value);
};
</script>
</tr>
<tr>
<td align=center colspan=6><big><b>2. ПРОФЕССИОНАЛЬНАЯ АКТИВНОСТЬ</b></big></td>
</tr>
<tr>
<td align=center colspan=6><big><b>2.1 Учебная работа</b></big></td>
</tr>
<tr>
<td align=center>2.1.1</td>
<td align=left>Количество прочитанных лекций</td>
<td align=center> 1 час</td>
<td align=center> 0,1 </td>
<td align=center><?= $form->field($model, 'punkt211')->textInput()->label(''); ?></td>
<td align=center name="punkt211a"><?= Html::encode($model->punkt211)*0.1 ?></td>
 <script type='text/javascript'>
$('#reitingprepod-punkt211').keyup(function(){
document.getElementsByName('punkt211a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt211]')[0].value * 0.1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.1.2</td>
<td align=left>Количество проведенных семинарских / практических занятий</td>
<td align=center> 1 час</td>
<td align=center> 0,05 </td>
<td align=center><?= $form->field($model, 'punkt212')->textInput()->label(''); ?></td>
<td align=center name="punkt212a"><?= Html::encode($model->punkt212)*0.05 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt212').keyup(function(){
document.getElementsByName('punkt212a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt212]')[0].value * 0.05;
val_reitinga();
val_itog();
});
</script>
 </tr>
<tr>
<td align=center>2.1.3</td>
<td align=left>Руководство дипломными работами</td>
<td align=center> 1 шт</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt213')->textInput()->label(''); ?></td>
 <td align=center name="punkt213a"><?= Html::encode($model->punkt213)*2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt213').keyup(function(){
document.getElementsByName('punkt213a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt213]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
 </tr>
<tr>
<td align=center>2.1.4</td>
<td align=left>Руководство дипломными проектами</td>
<td align=center> 1 шт</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt214')->textInput()->label(''); ?></td>
 <td align=center name="punkt214a"><?= Html::encode($model->punkt214)*3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt214').keyup(function(){
document.getElementsByName('punkt214a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt214]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
 </tr>
<tr>
<td align=center>2.1.5</td>
<td align=left>Рецензирование дипломных работ и проектов</td>
<td align=center> 1 шт</td>
<td align=center> 1 </td>
<td align=center><?= $form->field($model, 'punkt215')->textInput()->label(''); ?></td>
<td align=center name="punkt215a"><?= Html::encode($model->punkt215) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt215').keyup(function(){
document.getElementsByName('punkt215a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt215]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.1.6</td>
<td align=left>Подготовка дипломной работы / проекта по заказу предприятия</td>
<td align=center> 1 шт</td>
<td align=center> 3 / 5 </td>
<td align=center><?= $form->field($model, 'punkt216')->textInput()->label(''); ?></td>
<td align=center name="punkt216a"><?= Html::encode($model->punkt216) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt216').keyup(function(){
document.getElementsByName('punkt216a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt216]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.1.7</td>
<td align=left>Подготовка дипломной работы / проекта со справкой о результатах внедрения</td>
<td align=center> 1 шт</td>
<td align=center> 2 / 4 </td>
<td align=center><?= $form->field($model, 'punkt217')->textInput()->label(''); ?></td>
<td align=center name="punkt217a"><?= Html::encode($model->punkt217) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt217').keyup(function(){
document.getElementsByName('punkt217a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt217]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.1.8</td>
<td align=left>Подготовка презентации к защите дипломной работы / дипломного проекта</td>
<td align=center> 1 дипломная работа</td>
<td align=center> 2 / 3 </td>
<td align=center><?= $form->field($model, 'punkt218')->textInput()->label(''); ?></td>
<td align=center name="punkt218a"><?= Html::encode($model->punkt218) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt218').keyup(function(){
document.getElementsByName('punkt218a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt218]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.1.9</td>
<td align=left>Член ГАК</td>
<td align=center> 1 специальность</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt219')->textInput()->label(''); ?></td>
<td align=center name="punkt219a"><?= Html::encode($model->punkt219) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt219').keyup(function(){
document.getElementsByName('punkt219a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt219]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.1.10</td>
<td align=left>Реализация программ дополнительного профессионального образования</td>
<td align=center> 1 дисциплина</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt2110')->textInput()->label(''); ?></td>
<td align=center name="punkt2110a"><?= Html::encode($model->punkt2110) * 2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2110').keyup(function(){
document.getElementsByName('punkt2110a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2110]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center rowspan=2>2.1.11</td>
<td align=left>Член приемной экзаменационной комиссии</td>
<td align=center> 1 дисциплина</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt2111a')->textInput()->label(''); ?></td>
<td align=center name="punkt2111aa"><?= Html::encode($model->punkt2111a) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2111a').keyup(function(){
document.getElementsByName('punkt2111aa')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2111a]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>Член приемной аттестационной комиссии</td>
<td align=center> 1 дисциплина</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt2111b')->textInput()->label(''); ?></td>
<td align=center name="punkt2111ba"><?= Html::encode($model->punkt2111b) * 2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2111b').keyup(function(){
document.getElementsByName('punkt2111ba')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2111b]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center colspan=6><big><b>2.2 Учебно-методическая работа</b></big></td>
</tr>
<tr>
<td align=center>2.2.1</td>
<td align=left>Разработка нового учебного курса: 50-99 часов / 100-199 часов / 200-299 часов / 300 и более часов </td>
<td align=center> общая трудоемкость</td>
<td align=center> 5 / 10 / 15 / 20 </td>
<td align=center><?= $form->field($model, 'punkt221')->textInput()->label(''); ?></td>
<td align=center name="punkt221a"><?= Html::encode($model->punkt221) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt221').keyup(function(){
document.getElementsByName('punkt221a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt221]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center rowspan=5>2.2.2</td>
<td align=left>Издание учебно-методических материалов: </td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
</tr>
<tr>
<td align=left>- курс лекций </td>
<td align=center> 1 п.л.</td>
<td align=center> 8 </td>
<td align=center><?= $form->field($model, 'punkt222a')->textInput()->label(''); ?></td>
<td align=center name="punkt222aa"><?= Html::encode($model->punkt222a) * 8 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt222a').keyup(function(){
document.getElementsByName('punkt222aa')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt222a]')[0].value * 8;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- практикум(сборник практических работ, сборник упражнений и задач, сборник тестов, рабочая тетрадь) </td>
<td align=center> 1 п.л.</td>
<td align=center> 8 </td>
<td align=center><?= $form->field($model, 'punkt222b')->textInput()->label(''); ?></td>
<td align=center name="punkt222ba"><?= Html::encode($model->punkt222b) * 8 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt222b').keyup(function(){
document.getElementsByName('punkt222ba')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt222b]')[0].value * 8;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- учебно-методический комплекс </td>
<td align=center> 1 п.л.</td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt222c')->textInput()->label(''); ?></td>
<td align=center name="punkt222ca"><?= Html::encode($model->punkt222c) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt222c').keyup(function(){
document.getElementsByName('punkt222ca')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt222c]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- методические указания </td>
<td align=center> 1 п.л.</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt222d')->textInput()->label(''); ?></td>
<td align=center name="punkt222da"><?= Html::encode($model->punkt222d) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt222d').keyup(function(){
document.getElementsByName('punkt222da')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt222d]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.2.3</td>
<td align=left>Разработка основной образовательной программы </td>
<td align=center> 1 программа</td>
<td align=center> 15 </td>
<td align=center><?= $form->field($model, 'punkt223')->textInput()->label(''); ?></td>
<td align=center name="punkt223a"><?= Html::encode($model->punkt223) * 15 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt223').keyup(function(){
document.getElementsByName('punkt223a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt223]')[0].value * 15;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.2.4</td>
<td align=left>Разработка рабочей программы дисциплин</td>
<td align=center> 1 шт.</td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt224')->textInput()->label(''); ?></td>
<td align=center name="punkt224a"><?= Html::encode($model->punkt224) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt224').keyup(function(){
document.getElementsByName('punkt224a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt224]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.2.5</td>
<td align=left>Разработка учебно-методического комплекса дисциплины (без издания его в текущем уч. году)</td>
<td align=center> 1 шт.</td>
<td align=center> 10 </td>
<td align=center><?= $form->field($model, 'punkt225')->textInput()->label(''); ?></td>
<td align=center name="punkt225a"><?= Html::encode($model->punkt225) * 10 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt225').keyup(function(){
document.getElementsByName('punkt225a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt225]')[0].value * 10;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center rowspan=3>2.2.6</td>
<td align=left>Разработка фонда контрольно-измерительных материалов:</td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
 <td align=center></td>
</tr>
<tr>
<td align=left>- тестовые задания</td>
<td align=center> 50 шт.</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt226a')->textInput()->label(''); ?></td>
<td align=center name="punkt226aa"><?= Html::encode($model->punkt226a) * 2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt226a').keyup(function(){
document.getElementsByName('punkt226aa')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt226a]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- экзаменационные билеты</td>
<td align=center>комплект</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt226b')->textInput()->label(''); ?></td>
<td align=center name="punkt226ba"><?= Html::encode($model->punkt226b) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt226b').keyup(function(){
document.getElementsByName('punkt226ba')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt226b]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.2.7</td>
<td align=left>Подготовка учебно-методических материалов презентационного характера в электронном виде</td>
<td align=center> 10 слайдов</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt227')->textInput()->label(''); ?></td>
<td align=center name="punkt227a"><?= Html::encode($model->punkt227) * 2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt227').keyup(function(){
document.getElementsByName('punkt227a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt227]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center rowspan=3>2.2.8</td>
<td align=left>Подготовка образовательных электронных материалов:</td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
 <td align=center></td>
</tr>
<tr>
<td align=left>- кейс ученой дисциплины</td>
<td align=center> 1 шт.</td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt228a')->textInput()->label(''); ?></td>
<td align=center name="punkt228aa"><?= Html::encode($model->punkt228a) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt228a').keyup(function(){
document.getElementsByName('punkt228aa')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt228a]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- электронных учебник (зарегестрированный в установленном порядке)</td>
<td align=center> 1 шт.</td>
<td align=center> 10 </td>
<td align=center><?= $form->field($model, 'punkt228b')->textInput()->label(''); ?></td>
<td align=center name="punkt228ba"><?= Html::encode($model->punkt228b) * 10 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt228b').keyup(function(){
document.getElementsByName('punkt228ba')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt228b]')[0].value * 10;
val_reitinga();
val_itog();
});
</script>
 </tr>
<tr>
<td align=center>2.2.9</td>
<td align=left>Подготовка материалов для самостоятельной работы студентов: до 39 часов / 40-79 часов / 80-119 часов / 120-159 часов / 160 и более часов</td>
<td align=center> общая трудоемкость</td>
<td align=center> 1 / 2 / 3 / 4 / 5 </td>
<td align=center><?= $form->field($model, 'punkt229')->textInput()->label(''); ?></td>
<td align=center name="punkt229a"><?= Html::encode($model->punkt229) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt229').keyup(function(){
document.getElementsByName('punkt229a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt229]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.2.10</td>
<td align=left>Разработка программ дополнительного профессионального образования</td>
<td align=center> 1 программа</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt2210')->textInput()->label(''); ?></td>
<td align=center name="punkt2210a"><?= Html::encode($model->punkt2210) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2210').keyup(function(){
document.getElementsByName('punkt2210a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2210]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.2.11</td>
<td align=left>Подготовка студентов в участии ФЭПО</td>
<td align=center> 1 дисциплина</td>
<td align=center> 8 </td>
<td align=center><?= $form->field($model, 'punkt2211')->textInput()->label(''); ?></td>
<td align=center name="punkt2211a"><?= Html::encode($model->punkt2211) * 8 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2211').keyup(function(){
document.getElementsByName('punkt2211a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2211]')[0].value * 8;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center colspan=6><big><b>2.3 Научно-исследовательская работа</b></big></td>
</tr>
<tr>
<td align=center>2.3.1</td>
<td align=left>Выполнение научных исследований (с подготовкой отчета)</td>
<td align=center> 1 п.л.</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt231')->textInput()->label(''); ?></td>
<td align=center name="punkt231a"><?= Html::encode($model->punkt231) * 2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt231').keyup(function(){
document.getElementsByName('punkt231a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt231]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center rowspan=5>2.3.2</td>
<td align=left>Издание материалов научно-исследовательской работы:</td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
 <td align=center></td>
</tr>
<tr>
<td align=left>- научная статья: в журналах, рекомендованных ВАК / в прочих журналах и сборниках</td>
<td align=center> 1 п.л.</td>
<td align=center> 7 / 2 </td>
<td align=center><?= $form->field($model, 'punkt232a')->textInput()->label(''); ?></td>
<td align=center name="punkt232aa"><?= Html::encode($model->punkt232a) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt232a').keyup(function(){
document.getElementsByName('punkt232aa')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt232a]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- монография: индивидуальная / коллективная</td>
<td align=center> 1 п.л.</td>
<td align=center> 25 / 15 </td>
<td align=center><?= $form->field($model, 'punkt232b')->textInput()->label(''); ?></td>
<td align=center name="punkt232ba"><?= Html::encode($model->punkt232b) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt232b').keyup(function(){
document.getElementsByName('punkt232ba')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt232b]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- учебник: с грифом / без грифа</td>
<td align=center> 1 п.л.</td>
<td align=center> 30 / 20 </td>
<td align=center><?= $form->field($model, 'punkt232c')->textInput()->label(''); ?></td>
<td align=center name="punkt232ca"><?= Html::encode($model->punkt232c) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt232c').keyup(function(){
document.getElementsByName('punkt232ca')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt232c]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- учебное пособие: с грифом / без грифа</td>
<td align=center> 1 п.л.</td>
<td align=center> 20 / 10 </td>
<td align=center><?= $form->field($model, 'punkt232d')->textInput()->label(''); ?></td>
<td align=center name="punkt232da"><?= Html::encode($model->punkt232d) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt232d').keyup(function(){
document.getElementsByName('punkt232da')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt232d]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.3</td>
<td align=left>Подготовка официального отзыва на диссертацию: докторскую / кандидатскую</td>
<td align=center> 1 шт</td>
<td align=center> 5 / 3 </td>
<td align=center><?= $form->field($model, 'punkt233')->textInput()->label(''); ?></td>
<td align=center name="punkt233a"><?= Html::encode($model->punkt233) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt233').keyup(function(){
document.getElementsByName('punkt233a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt233]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.4</td>
<td align=left>Подготовка  отзыва на автореферат: докторской диссертации / кандидатской диссертации</td>
<td align=center> 1 шт</td>
<td align=center> 2 / 1 </td>
<td align=center><?= $form->field($model, 'punkt234')->textInput()->label(''); ?></td>
<td align=center name="punkt234a"><?= Html::encode($model->punkt234) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt234').keyup(function(){
document.getElementsByName('punkt234a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt234]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.5</td>
<td align=left>Рецензирование монографии, учебников, учебных пособий, методических материалов и т.д.</td>
<td align=center> 1 шт</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt235')->textInput()->label(''); ?></td>
<td align=center name="punkt235a"><?= Html::encode($model->punkt235) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt235').keyup(function(){
document.getElementsByName('punkt235a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt235]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.6</td>
<td align=left>Редактирование монографии, учебников, учебных пособий, методических материалов и т.д.</td>
<td align=center> 1 шт</td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt236')->textInput()->label(''); ?></td>
<td align=center name="punkt236a"><?= Html::encode($model->punkt236) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt236').keyup(function(){
document.getElementsByName('punkt236a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt236]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.7</td>
<td align=left>Участие в научно-практических конференциях, круглых столах, методических семинарах и т.д.: международных / всероссийских / региональных, вузовских</td>
<td align=center> 1 шт</td>
<td align=center> 3 / 2 / 1 </td>
<td align=center><?= $form->field($model, 'punkt237')->textInput()->label(''); ?></td>
<td align=center name="punkt237a"><?= Html::encode($model->punkt237) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt237').keyup(function(){
document.getElementsByName('punkt237a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt237]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.8</td>
<td align=left>Организация и проведение научных мероприятий (студенческих предметных конференций, круглых столов, деловых игор, предметных олимпиад и т.д.)</td>
<td align=center> 1 шт</td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt238')->textInput()->label(''); ?></td>
<td align=center name="punkt238a"><?= Html::encode($model->punkt238) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt238').keyup(function(){
document.getElementsByName('punkt238a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt238]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.9</td>
<td align=left>Оформление заявки на участие в конкурсе грантов: международных / всероссийских / региональных</td>
<td align=center> 1 заявка</td>
<td align=center> 10 / 7 / 3 </td>
<td align=center><?= $form->field($model, 'punkt239')->textInput()->label(''); ?></td>
<td align=center name="punkt239a"><?= Html::encode($model->punkt239) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt239').keyup(function(){
document.getElementsByName('punkt239a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt239]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.10</td>
<td align=left>Получение дипломов лауреатов и др. наград: международных / всероссийских / региональных, вузовских</td>
<td align=center> 1 диплом</td>
<td align=center> 5 / 3 / 2 </td>
<td align=center><?= $form->field($model, 'punkt2310')->textInput()->label(''); ?></td>
<td align=center name="punkt2310a"><?= Html::encode($model->punkt2310) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2310').keyup(function(){
document.getElementsByName('punkt2310a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2310]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.11</td>
<td align=left>Руководство студентами-победителями (призерами) олимпиад, конференций, конкурсов по специальности: международных / всероссийских / региональных / вузовских</td>
<td align=center> 1 чел.</td>
<td align=center> 5 / 4 / 2 / 1 </td>
<td align=center><?= $form->field($model, 'punkt2311')->textInput()->label(''); ?></td>
<td align=center name="punkt2311a"><?= Html::encode($model->punkt2311) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2311').keyup(function(){
document.getElementsByName('punkt2311a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2311]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.12</td>
<td align=left>Руководство научно-исследовательской работой студентов с представлением докладов на конференциях, круглых столах, конкурсах и т.д.: международных / всероссийских / региональных, вузовских</td>
<td align=center> 1 чел.</td>
<td align=center> 3 / 2 / 1 </td>
<td align=center><?= $form->field($model, 'punkt2312')->textInput()->label(''); ?></td>
<td align=center name="punkt2312a"><?= Html::encode($model->punkt2312) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2312').keyup(function(){
document.getElementsByName('punkt2312a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2312]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.3.13</td>
<td align=left>Руководство студентом, опубликовавшим научную статью</td>
<td align=center> 1 статья</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt2313')->textInput()->label(''); ?></td>
<td align=center name="punkt2313a"><?= Html::encode($model->punkt2313) * 2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2313').keyup(function(){
document.getElementsByName('punkt2313a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2313]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center colspan=6><big><b>2.4 Повышение квалификации</b></big></td>
</tr>
<tr>
<td align=center rowspan=6>2.4.1</td>
<td align=left>Повышение квалификации в отчетном году (при наличии подтверждающего документа):</td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
 <td align=center></td>
</tr>
<tr>
<td align=left>- с отрывом от работы в других ведущих вузах РФ и за ее пределами</td>
<td align=center> 1 шт</td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt241a')->textInput()->label(''); ?></td>
<td align=center name="punkt241aa"><?= Html::encode($model->punkt241a) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt241a').keyup(function(){
document.getElementsByName('punkt241aa')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt241a]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- стажировка</td>
<td align=center> 1 шт</td>
<td align=center> 4 </td>
<td align=center><?= $form->field($model, 'punkt241b')->textInput()->label(''); ?></td>
<td align=center name="punkt241ba"><?= Html::encode($model->punkt241b) * 4 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt241b').keyup(function(){
document.getElementsByName('punkt241ba')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt241b]')[0].value * 4;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- внутривузовское повышение квалификации</td>
<td align=center> 1 шт</td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt241c')->textInput()->label(''); ?></td>
<td align=center name="punkt241ca"><?= Html::encode($model->punkt241c) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt241c').keyup(function(){
document.getElementsByName('punkt241ca')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt241c]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- обучение: в докторантуре / в аспирантуре / соискательство</td>
<td align=center> 1 шт</td>
<td align=center> 3 / 1 / 1 </td>
<td align=center><?= $form->field($model, 'punkt241d')->textInput()->label(''); ?></td>
<td align=center name="punkt241da"><?= Html::encode($model->punkt241d) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt241d').keyup(function(){
document.getElementsByName('punkt241da')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt241d]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- защита дисертации: докторской / кандидатской</td>
<td align=center> -</td>
<td align=center> 50 / 20 </td>
<td align=center><?= $form->field($model, 'punkt241e')->textInput()->label(''); ?></td>
<td align=center name="punkt241ea"><?= Html::encode($model->punkt241e) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt241e').keyup(function(){
document.getElementsByName('punkt241ea')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt241e]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center colspan=6><big><b>2.5 Организационная работа</b></big></td>
</tr>
<tr>
<td align=center>2.5.1</td>
<td align=left>Взаимопосещение учебных занятий преподавателей</td>
<td align=center> 1 занятие </td>
<td align=center> 1 </td>
<td align=center><?= $form->field($model, 'punkt251')->textInput()->label(''); ?></td>
<td align=center name="punkt251a"><?= Html::encode($model->punkt251) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt251').keyup(function(){
document.getElementsByName('punkt251a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt251]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.2</td>
<td align=left>Участие в работе Ученого совета филиала: председателя / секретаря / члена</td>
<td align=center> - </td>
<td align=center> 10 / 6 / 5 </td>
<td align=center><?= $form->field($model, 'punkt252')->textInput()->label(''); ?></td>
<td align=center name="punkt252a"><?= Html::encode($model->punkt252) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt252').keyup(function(){
document.getElementsByName('punkt252a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt252]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.3</td>
<td align=left>Участие в работе Методического совета филиала: председателя / секретаря / члена</td>
<td align=center> - </td>
<td align=center> 6 / 4 / 3 </td>
<td align=center><?= $form->field($model, 'punkt253')->textInput()->label(''); ?></td>
<td align=center name="punkt253a"><?= Html::encode($model->punkt253) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt253').keyup(function(){
document.getElementsByName('punkt253a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt253]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.4</td>
<td align=left>Участие в работе методических семинарах: филиала / кафедры</td>
<td align=center> - </td>
<td align=center> 4 / 2  </td>
<td align=center><?= $form->field($model, 'punkt254')->textInput()->label(''); ?></td>
<td align=center name="punkt254a"><?= Html::encode($model->punkt254) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt254').keyup(function(){
document.getElementsByName('punkt254a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt254]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.5</td>
<td align=left>Подготовка и проведение методических семинаров: филиала / кафедры</td>
<td align=center> - </td>
<td align=center> 6 / 3  </td>
<td align=center><?= $form->field($model, 'punkt255')->textInput()->label(''); ?></td>
<td align=center name="punkt255a"><?= Html::encode($model->punkt255) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt255').keyup(function(){
document.getElementsByName('punkt255a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt255]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.6</td>
<td align=left>Подготовка и проведение открытого занятия</td>
<td align=center> - </td>
<td align=center> 5  </td>
<td align=center><?= $form->field($model, 'punkt256')->textInput()->label(''); ?></td>
<td align=center name="punkt256a"><?= Html::encode($model->punkt256) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt256').keyup(function(){
document.getElementsByName('punkt256a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt256]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.7</td>
<td align=left>Участие в планировании книгозакупок по преподаваемым дисциплинам</td>
<td align=center> 1 дисциплина </td>
<td align=center> 0.1  </td>
<td align=center><?= $form->field($model, 'punkt257')->textInput()->label(''); ?></td>
<td align=center name="punkt257a"><?= Html::encode($model->punkt257) * 0.1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt257').keyup(function(){
document.getElementsByName('punkt257a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt257]')[0].value * 0.1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.8</td>
<td align=left>Обновление информации на сайте</td>
<td align=center> - </td>
<td align=center> 1 </td>
<td align=center><?= $form->field($model, 'punkt258')->textInput()->label(''); ?></td>
<td align=center name="punkt258a"><?= Html::encode($model->punkt258) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt258').keyup(function(){
document.getElementsByName('punkt258a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt258]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.9</td>
<td align=left>Подготовка отчетов различного характера (за исключением депонированного отчета)</td>
<td align=center> - </td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt259')->textInput()->label(''); ?></td>
<td align=center name="punkt259a"><?= Html::encode($model->punkt259) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt259').keyup(function(){
document.getElementsByName('punkt259a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt259]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.5.10</td>
<td align=left>Выполнение обязанностей ответственного на кафедре за определенное направление деятельности</td>
<td align=center> - </td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt2510')->textInput()->label(''); ?></td>
<td align=center name="punkt2510a"><?= Html::encode($model->punkt2510) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt2510').keyup(function(){
document.getElementsByName('punkt2510a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt2510]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center colspan=6><big><b>2.6 Воспитательная и профориентационная работа</b></big></td>
</tr>
<tr>
<td align=center>2.6.1</td>
<td align=left>Работа в качестве куратора студенческой группы</td>
<td align=center> 1 группа </td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt261')->textInput()->label(''); ?></td>
<td align=center name="punkt261a"><?= Html::encode($model->punkt261) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt261').keyup(function(){
document.getElementsByName('punkt261a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt261]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.6.2</td>
<td align=left>Проведение мероприятий в студенческих группах</td>
<td align=center> 1 мероприятие </td>
<td align=center> 1 </td>
<td align=center><?= $form->field($model, 'punkt262')->textInput()->label(''); ?></td>
<td align=center name="punkt262a"><?= Html::encode($model->punkt262) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt262').keyup(function(){
document.getElementsByName('punkt262a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt262]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.6.3</td>
<td align=left>Наличие благодарственных писем за подготовку специалистов</td>
<td align=center> 1 письмо </td>
<td align=center> 0.5 </td>
<td align=center><?= $form->field($model, 'punkt263')->textInput()->label(''); ?></td>
<td align=center name="punkt263a"><?= Html::encode($model->punkt263) * 0.5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt263').keyup(function(){
document.getElementsByName('punkt263a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt263]')[0].value * 0.5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center rowspan=6>2.6.4</td>
<td align=left>Участие в мероприятиях профориентационного характера:</td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
<td align=center></td>
</tr>
<tr>
<td align=left>- профориентационные выезды в образовательные учреждения Оренбургской области и на Дни выпуска</td>
<td align=center> 1 выезд</td>
<td align=center> 2 </td>
<td align=center><?= $form->field($model, 'punkt264a')->textInput()->label(''); ?></td>
<td align=center name="punkt264aa"><?= Html::encode($model->punkt264a) * 2 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt264a').keyup(function(){
document.getElementsByName('punkt264aa')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt264a]')[0].value * 2;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- проведение Дня абитуриента в образовательных учреждениях города Оренбурга</td>
<td align=center> 1 выезд</td>
<td align=center> 1 </td>
<td align=center><?= $form->field($model, 'punkt264b')->textInput()->label(''); ?></td>
<td align=center name="punkt264ba"><?= Html::encode($model->punkt264b) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt264b').keyup(function(){
document.getElementsByName('punkt264ba')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt264b]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- подготовка писем профориентационного характера</td>
<td align=center> 10 писем</td>
<td align=center> 1 </td>
<td align=center><?= $form->field($model, 'punkt264c')->textInput()->label(''); ?></td>
<td align=center name="punkt264ca"><?= Html::encode($model->punkt264c) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt264c').keyup(function(){
document.getElementsByName('punkt264ca')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt264c]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- подготовка статей и публикаций профориентационного характера</td>
<td align=center> 1 п.л.</td>
<td align=center> 1 </td>
<td align=center><?= $form->field($model, 'punkt264d')->textInput()->label(''); ?></td>
<td align=center name="punkt264da"><?= Html::encode($model->punkt264d) * 1 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt264d').keyup(function(){
document.getElementsByName('punkt264da')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt264d]')[0].value * 1;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=left>- проведение олимпиад, конкурсов научных работ для школьников и студентов образовательных учреждений среднего профессионального образования</td>
<td align=center> 1 мероприятие</td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt264e')->textInput()->label(''); ?></td>
<td align=center name="punkt264ea"><?= Html::encode($model->punkt264e) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt264e').keyup(function(){
document.getElementsByName('punkt264ea')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt264e]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center colspan=6><big><b>2.7 Работа по реализации профсоюзной направленности</b></big></td>
</tr>
<tr>
<td align=center>2.7.1</td>
<td align=left>Проведение занятий в системе профсоюзного образования</td>
<td align=center> 1 час </td>
<td align=center> 3 </td>
<td align=center><?= $form->field($model, 'punkt271')->textInput()->label(''); ?></td>
<td align=center name="punkt271a"><?= Html::encode($model->punkt271) * 3 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt271').keyup(function(){
document.getElementsByName('punkt271a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt271]')[0].value * 3;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.7.2</td>
<td align=left>Проведение студенческих мероприятий профсоюзной направленности (конференции, встречи-дискуссии, круглые столы, конкурсы, выставки и т.д.)</td>
<td align=center> 1 мероприятие </td>
<td align=center> 8 </td>
<td align=center><?= $form->field($model, 'punkt272')->textInput()->label(''); ?></td>
<td align=center name="punkt272a"><?= Html::encode($model->punkt272) * 8 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt272').keyup(function(){
document.getElementsByName('punkt272a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt272]')[0].value * 8;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.7.3</td>
<td align=left>Подготовка дипломных работ / проектов по проблемам регулирования социально-трудовых отношений и профсоюзного движения</td>
<td align=center> 1 работа </td>
<td align=center> 5 </td>
<td align=center><?= $form->field($model, 'punkt273')->textInput()->label(''); ?></td>
<td align=center name="punkt273a"><?= Html::encode($model->punkt273) * 5 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt273').keyup(function(){
document.getElementsByName('punkt273a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt273]')[0].value * 5;
val_reitinga();
val_itog();
});
</script>
</tr>
<tr>
<td align=center>2.7.4</td>
<td align=left>Разработка учебно-методических материалов по проблемам регулирования социально-трудовых отношений и профсоюзного движения</td>
<td align=center> 1 п.л. </td>
<td align=center> 10 </td>
<td align=center><?= $form->field($model, 'punkt274')->textInput()->label(''); ?></td>
<td align=center name="punkt274a"><?= Html::encode($model->punkt274) * 10 ?></td>
<script type='text/javascript'>
$('#reitingprepod-punkt274').keyup(function(){
document.getElementsByName('punkt274a')[0].innerHTML = document.getElementsByName('Reitingprepod[punkt274]')[0].value * 10;
val_reitinga();
val_itog();
});
</script>
</tr>

<tr>
<td align=right colspan=5><b>Итого по рейтингу "A":</b></td>
<td><?= $form->field($model, 'reitingA')->textInput()->label(''); ?></td>
</tr>
<tr>
<td align=right colspan=5><b>Введите "РЗ"(от 0 до 20):</b></td>
<td><?= $form->field($model, 'rz')->textInput()->label(''); ?></td>
<?= $form->field($model, 'itog')->hiddenInput()->label(''); ?>
<script type='text/javascript'>
$('#reitingprepod-reitinga').keyup(function(){
	val_reitinga();
});

$('#reitingprepod-rz').keyup(function(){
	document.getElementById('rz').innerHTML = document.getElementsByName('Reitingprepod[rz]')[0].value;
	val_itog();
});

function val_reitinga() {
document.getElementsByName('Reitingprepod[reitingA]')[0].value = Number(document.getElementsByName('Reitingprepod[punkt211]')[0].value * 0.1) + Number(document.getElementsByName('Reitingprepod[punkt212]')[0].value * 0.05) + Number(document.getElementsByName('Reitingprepod[punkt213]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt214]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt215]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt216]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt217]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt218]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt219]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt2110]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt2111a]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt2111b]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt221]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt222a]')[0].value * 8) + Number(document.getElementsByName('Reitingprepod[punkt222b]')[0].value * 8) + Number(document.getElementsByName('Reitingprepod[punkt222c]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt222d]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt223]')[0].value * 15) + Number(document.getElementsByName('Reitingprepod[punkt224]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt225]')[0].value * 10) + Number(document.getElementsByName('Reitingprepod[punkt226a]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt226b]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt227]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt228a]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt228b]')[0].value * 10) + Number(document.getElementsByName('Reitingprepod[punkt229]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt2210]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt2211]')[0].value * 8) + Number(document.getElementsByName('Reitingprepod[punkt231]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt232a]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt232b]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt232c]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt232d]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt233]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt234]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt235]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt236]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt237]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt238]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt239]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt2310]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt2311]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt2312]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt2313]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt241a]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt241b]')[0].value * 4) + Number(document.getElementsByName('Reitingprepod[punkt241c]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt241d]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt241e]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt251]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt252]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt253]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt254]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt255]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt256]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt257]')[0].value * 0.1) + Number(document.getElementsByName('Reitingprepod[punkt258]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt259]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt2510]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt261]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt262]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt263]')[0].value * 0.5) + Number(document.getElementsByName('Reitingprepod[punkt264a]')[0].value * 2) + Number(document.getElementsByName('Reitingprepod[punkt264b]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt264c]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt264d]')[0].value) + Number(document.getElementsByName('Reitingprepod[punkt264e]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt271]')[0].value * 3) + Number(document.getElementsByName('Reitingprepod[punkt272]')[0].value * 8) + Number(document.getElementsByName('Reitingprepod[punkt273]')[0].value * 5) + Number(document.getElementsByName('Reitingprepod[punkt274]')[0].value * 10);
document.getElementById('eitingp').innerHTML = document.getElementsByName('Reitingprepod[reitingA]')[0].value;
document.getElementById('eitingp').innerHTML = document.getElementsByName('Reitingprepod[reitingP]')[0].value;
val_time_kafedra();
};
function val_time_kafedra() {
if ((document.getElementsByName('Reitingprepod[kafedra]')[0].value == 'Экономики и управления') && (document.getElementsByName('Reitingprepod[yearrs]')[0].value == '2016/2017')) {
document.getElementById('time_kafedra').innerHTML = '12094.8';	
}
if ((document.getElementsByName('Reitingprepod[kafedra]')[0].value == 'Профсоюзного движения, гуманитарных и социально-экономических дисциплин') && (document.getElementsByName('Reitingprepod[yearrs]')[0].value == '2016/2017')) {
document.getElementById('time_kafedra').innerHTML = '1608';	
}
if ((document.getElementsByName('Reitingprepod[kafedra]')[0].value == 'Экономики и управления') && (document.getElementsByName('Reitingprepod[yearrs]')[0].value == '2017/2018')) {
document.getElementById('time_kafedra').innerHTML = '1';	
}
if ((document.getElementsByName('Reitingprepod[kafedra]')[0].value == 'Профсоюзного движения, гуманитарных и социально-экономических дисциплин') && (document.getElementsByName('Reitingprepod[yearrs]')[0].value == '2017/2018')) {
document.getElementById('time_kafedra').innerHTML = '1';	
}
}

document.getElementById('eitingp').innerHTML = document.getElementsByName('Reitingprepod[reitingP]')[0].value;
document.getElementById('eitinga').innerHTML = document.getElementsByName('Reitingprepod[reitingA]')[0].value;
document.getElementById('stavkaa').innerHTML = document.getElementsByName('Reitingprepod[stavka]')[0].value;
document.getElementById('audit_nagruzka').innerHTML = document.getElementsByName('Reitingprepod[audit_nagruz]')[0].value;
document.getElementById('rz').innerHTML = document.getElementsByName('Reitingprepod[rz]')[0].value;
val_time_kafedra();
val_reitinga();
val_itog();

function val_itog() {
document.getElementById('itog').innerHTML = Math.round((Number(document.getElementsByName('Reitingprepod[reitingP]')[0].value) * 0.33) + (Number(document.getElementsByName('Reitingprepod[reitingA]')[0].value) * 0.67) + ((Number(Number(document.getElementsByName('Reitingprepod[audit_nagruz]')[0].value) / Number(document.getElementById('time_kafedra').innerHTML))*100) * Number(document.getElementsByName('Reitingprepod[stavka]')[0].value)) + Number(document.getElementsByName('Reitingprepod[rz]')[0].value));
document.getElementsByName('Reitingprepod[itog]')[0].value = Math.round((Number(document.getElementsByName('Reitingprepod[reitingP]')[0].value) * 0.33) + (Number(document.getElementsByName('Reitingprepod[reitingA]')[0].value) * 0.67) + ((Number(Number(document.getElementsByName('Reitingprepod[audit_nagruz]')[0].value) / Number(document.getElementById('time_kafedra').innerHTML))*100) * Number(document.getElementsByName('Reitingprepod[stavka]')[0].value)) + Number(document.getElementsByName('Reitingprepod[rz]')[0].value));
}

</script>
</tr>
</table>
<p></p>
<p>Личный рейтинг преподавателя: 0.33 * П + 0,67 * А +Н(%) * С + РЗ = 0.33 * <span id="eitingp" name="eitingp">0</span> + 0.67 * <span id="eitinga" name="eitinga">0</span> + (<span id="audit_nagruzka" name="audit_nagruzka">0</span> / <span id="time_kafedra" name="time_kafedra">1</span> * 100%) * <span id="stavkaa" name="stavkaa">0</span> + <span id="rz" name="rz"><?= Html::encode($model->rz) ?></span> = <span id="itog" name="itog"><?= Html::encode($model->itog) ?></span>
</p>
<p></p>
<div align=center><?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'id' => 'saves-button']) ?></div>
<script type="text/javascript">
$("#seach-button").click(function(){ 
$('#NewForms').attr('action', '/reitingprepod/seachzav');
document.getElementById("kostil").style.display = "block";
val_time_kafedra();
});
$("#saves-button").click(function(){ 
$('#NewForms').attr('action', '/reitingprepod/saveszav');
});
val_time_kafedra();
</script>

<?php ActiveForm::end();
Pjax::end(); ?>
</div>

<script type="text/javascript">
document.getElementById("kostil").style.display = "none";
</script>
</div>