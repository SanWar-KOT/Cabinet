<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Ancetaprepod;

/* @var $this yii\web\View */
$this->title = 'Анкета';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>
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

<h4 align="center" >Уважаемый студент!</h4>
<h4 align="justify" >Нам важно знать Ваше мнение относительно качества образования, получаемого в филиале. Отметьте наиболее полно отражающий Ваше мнение вариант ответа. Ответы будут использованны в обобщенном виде для анализа работы и повышения качества образования в филиале.<br>Благодарим Вас за участие в опросе!</h4>
<hr />
<?php $form = ActiveForm::begin(['action'=>['anceta/saves']]); ?>
<?= $form->field($model, 'login')->hiddenInput(['value' => Yii::$app->user->identity->FIO])->label(false); ?>
<table align="center" style="width: 100%;" border="1" cellpadding="0" cellspacing="0">
<tr>
<td align=center>№ п/п</td>
<td align=center>Вопросы студентам аккредитируемой программы</td>
<td align=center style="width: 30%;">Ответы</td>
</tr>
<tr>
<td align=center>1</td>
<td align=left>По какой форме обучения Вы получаете образование?</td>
<td align=left> 
<?= $form->field($model, 'p1')->radioList(['По очной' => 'По очной', 'Очно-заочной' => 'Очно-заочной', 'Заочной' => 'Заочной'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>2</td>
<td align=left>Каков срок обучения по вашей программе?</td>
<td align=left> 
<?= $form->field($model, 'p2')->radioList(['2 года' => '2 года', '3 года' => '3 года', '4 года' => '4 года', '4,5 года' => '4,5 года'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>3</td>
<td align=left>Соответствует ли структура программы Вашим ожиданиям? (присутствуют все дисциплины, изучение которых, по Вашему мнению, необходимо для ведения будущей профессиональной деятельности; нет дублирования дисциплин; нет нарушения логики преподавания дисциплин и т.п.)</td>
<td align=left> 
<?= $form->field($model, 'p3')->radioList(['Полностью соответствует' => 'Полностью соответствует', 'В основном соответствует' => 'В основном соответствует', 'В большей мере не соответствует' => 'В большей мере не соответствует', 'Не соответствует' => 'Не соответствует', 'Затрудняюсь ответить' => 'Затрудняюсь ответить'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>4</td>
<td align=left>Представлялась ли Вам возможность выбора дисциплин?</td>
<td align=left> 
<?= $form->field($model, 'p4')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Затрудняюсь ответить' => 'Затрудняюсь ответить'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>5</td>
<td align=left>Проводились ли у Вас занятия по физической культуре и на каких курсах?</td>
<td align=left> 
<?= $form->field($model, 'p5')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Редко' => 'Редко', 'Другое' => 'Другое'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>6</td>
<td align=left>В какой форме проводятся занятия по физической культуре?</td>
<td align=left> 
<?= $form->field($model, 'p6')->radioList(['Лекции' => 'Лекции', 'Практические занятия' => 'Практические занятия', 'Лекции и практические занятия' => 'Лекции и практические занятия'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>7</td>
<td align=left>Каким образом проходит организация практик, стажировок? Места практик определяются ВУЗом?</td>
<td align=left> 
<?= $form->field($model, 'p7')->radioList(['ВУЗом' => 'ВУЗом', 'Находим сами' => 'Находим сами', 'Другое' => 'Другое'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>8</td>
<td align=left>Всегда ли доступна Вам вся необходимая информация, касающаяся учебного процесса, внеучебных мероприятий?</td>
<td align=left> 
<?= $form->field($model, 'p8')->radioList(['Да, всегда' => 'Да, всегда', 'Нет, не всегда' => 'Нет, не всегда', 'Затрудняюсь ответить' => 'Затрудняюсь ответить', 'Другое' => 'Другое'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>9</td>
<td align=left>Есть ли у Вас возможность подключения к электронной библиотечной системе ВУЗа из любой точки, где есть сеть Интернет?</td>
<td align=left> 
<?= $form->field($model, 'p9')->radioList(['Да, всегда' => 'Да, всегда', 'Не всегда получается' => 'Не всегда получается', 'Нет' => 'Нет'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>10</td>
<td align=left>Доступны ли Вам учебники, методические пособия, лекции и т.д. в электронных и печатных формах?</td>
<td align=left> 
<?= $form->field($model, 'p10')->radioList(['Да' => 'Да', 'Нет' => 'Нет'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>11</td>
<td align=left>Как вы оцениваете их качество?</td>
<td align=left> 
<?= $form->field($model, 'p11')->radioList(['Полностью удовлетворен' => 'Полностью удовлетворен', 'Удовлетворен в большей мере' => 'Удовлетворен в большей мере', 'Не в полной мере' => 'Не в полной мере', 'Не удовлетворен' => 'Не удовлетворен'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>12</td>
<td align=left>Удовлетворяет ли Вашим потребностям компьютерное обеспечение учебного процесса?</td>
<td align=left> 
<?= $form->field($model, 'p12')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Не знаю' => 'Не знаю'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>13</td>
<td align=left>Удовлетворяет ли Вас качество аудиторий, помещений кафедр, фондов читального зала и библиотеки, учебных аудиторий и оборудования?</td>
<td align=left> 
<?= $form->field($model, 'p13')->radioList(['2 - не удовлетворяют' => '2 - не удовлетворяют',
'3 - не в полной мере' => '3 - не в полной мере',
'4 - в большей степени удовлетворен' => '4 - в большей степени удовлетворен',
'5 - удовлетворен полностью' => '5 - удовлетворен полностью'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>14</td>
<td align=left>Оцените, как организованна самостоятельная работа в ВУЗе: есть ли для этого помещение, компьютерное обеспечение и т.д.?</td>
<td align=left> 
<?= $form->field($model, 'p14')->radioList(['2 - не удовлетворяют' => '2 - не удовлетворяют',
'3 - не в полной мере' => '3 - не в полной мере',
'4 - в большей степени удовлетворен' => '4 - в большей степени удовлетворен',
'5 - удовлетворен полностью' => '5 - удовлетворен полностью'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>15</td>
<td align=left>Обучаются ли с Вами инвалиды и лица с ограниченными возможностями здоровья?</td>
<td align=left> 
<?= $form->field($model, 'p15')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Не знаю' => 'Не знаю'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>15a</td>
<td align=left>Если да то созданы ли для них специальные условия обучения?</td>
<td align=left> 
<?= $form->field($model, 'p15a')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Не знаю' => 'Не знаю', '-' => '-'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>16</td>
<td align=left>Влияет ли Ваше мнение на повышение качества образовательных ресурсов, используемых при реализации программы?</td>
<td align=left> 
<?= $form->field($model, 'p16')->radioList(['Да' => 'Да', 'Нет' => 'Нет', 'Затрудняюсь ответить' => 'Затрудняюсь ответить'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>17</td>
<td align=left>Удовлетворенны ли Вы тем, что обучаетесь в данном вузе и на данном направлении подготовки(специальности)?</td>
<td align=left> 
<?= $form->field($model, 'p17')->radioList(['Полностью удовлетворен' => 'Полностью удовлетворен', 'Частично удовлетворен' => 'Частично удовлетворен', 'Не знаю' => 'Не знаю'])->label(false); ?>
</td>
</tr>
<tr>
<td align=center>18</td>
<td align=left>Оцените, пожалуйста, качество образования в целом.</td>
<td align=left> 
<?= $form->field($model, 'p18')->radioList(['Неудовлетворительно' => 'Неудовлетворительно', 'Удовлетворительно' => 'Удовлетворительно', 'Хорошо' => 'Хорошо'])->label(false); ?>
</td>
</tr>
</table>
<p></p>
<div align = center> <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?> </div>
<?php ActiveForm::end();?>