<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Ancetaprepod;
use scotthuangzl\googlechart\GoogleChart;

/* @var $this yii\web\View */
$this->title = 'Результаты анкетирования';
$this->params['breadcrumbs'][] = $this->title;

echo Html::encode($p1_1);
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('По очной', $p1_1),
          array('Очно-заочной', $p1_2),
          array('Заочной', $p1_3),
          ),
    'options' => array('title' => 'По какой форме обучения Вы получаете образование?', 'is3D' => 'true', 'height'=> '300'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('2 года', $p2_1),
          array('3 года', $p2_2),
          array('4 года', $p2_3),
          array('4,5 года', $p2_4),
          ),
    'options' => array('title' => 'Каков срок обучения по вашей программе?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Полностью соответствует', $p3_1),
          array('В основном соответствует', $p3_2),
          array('В большей мере не соответствует', $p3_3),
          array('Не соответствует', $p3_4),
          array('Затрудняюсь ответить', $p3_5),
          ),
    'options' => array('title' => 'Соответствует ли структура программы Вашим ожиданиям? (присутствуют все дисциплины, изучение которых, по Вашему мнению, необходимо для ведения будущей профессиональной деятельности; нет дублирования дисциплин; нет нарушения логики преподавания дисциплин и т.п.)?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да', $p4_1),
          array('Нет', $p4_2),
          array('Затрудняюсь ответить', $p4_3),
          ),
    'options' => array('title' => 'Представлялась ли Вам возможность выбора дисциплин?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да', $p5_1),
          array('Нет', $p5_2),
          array('Редко', $p5_3),
          array('Другое', $p5_4),
          ),
    'options' => array('title' => 'Проводились ли у Вас занятия по физической культуре и на каких курсах?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>    

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Лекции', $p6_1),
          array('Практические занятия', $p6_2),
          array('Лекции и практические занятия', $p6_3),
          ),
    'options' => array('title' => 'В какой форме проводятся занятия по физической культуре?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>  

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('ВУЗом', $p7_1),
          array('Находим сами', $p7_2),
          array('Другое', $p7_3),
          ),
    'options' => array('title' => 'Каким образом проходит организация практик, стажировок? Места практик определяются ВУЗом?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да, всегда', $p8_1),
          array('Нет, не всегда', $p8_2),
          array('Затрудняюсь ответить', $p8_3),
          array('Другое', $p8_4),
          ),
    'options' => array('title' => 'Всегда ли доступна Вам вся необходимая информация, касающаяся учебного процесса, внеучебных мероприятий?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да, всегда', $p9_1),
          array('Не всегда получается', $p9_2),
          array('Нет', $p9_3),
          ),
    'options' => array('title' => 'Есть ли у Вас возможность подключения к электронной библиотечной системе ВУЗа из любой точки, где есть сеть Интернет?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да', $p10_1),
          array('Нет', $p10_2),
          ),
    'options' => array('title' => 'Доступны ли Вам учебники, методические пособия, лекции и т.д. в электронных и печатных формах?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Полностью удовлетворен', $p11_1),
          array('Удовлетворен в большей мере', $p11_2),
          array('Не в полной мере', $p11_3),
          array('Не удовлетворен', $p11_4),
          ),
    'options' => array('title' => 'Как вы оцениваете их качество?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да', $p12_1),
          array('Нет', $p12_2),
          array('Не знаю', $p12_3),
          ),
    'options' => array('title' => 'Удовлетворяет ли Вашим потребностям компьютерное обеспечение учебного процесса?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('2 - не удовлетворяют', $p13_1),
          array('3 - не в полной мере', $p13_2),
          array('4 - в большей степени удовлетворен', $p13_3),
          array('5 - удовлетворен полностью', $p13_4),
          ),
    'options' => array('title' => 'Удовлетворяет ли Вас качество аудиторий, помещений кафедр, фондов читального зала и библиотеки, учебных аудиторий и оборудования?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('2 - не удовлетворяют', $p14_1),
          array('3 - не в полной мере', $p14_2),
          array('4 - в большей степени удовлетворен', $p14_3),
          array('5 - удовлетворен полностью', $p14_4),
          ),
    'options' => array('title' => 'Оцените, как организованна самостоятельная работа в ВУЗе: есть ли для этого помещение, компьютерное обеспечение и т.д.?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да', $p15_1),
          array('Нет', $p15_2),
          array('Не знаю', $p15_3),
          ),
    'options' => array('title' => 'Обучаются ли с Вами инвалиды и лица с ограниченными возможностями здоровья?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да', $p15a_1),
          array('Нет', $p15a_2),
          array('Не знаю', $p15a_3),
          array('-', $p15a_4),
          ),
    'options' => array('title' => 'Если да то созданы ли для них специальные условия обучения?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Да', $p16_1),
          array('Нет', $p16_2),
          array('Затрудняюсь ответить', $p16_3),
          ),
    'options' => array('title' => 'Влияет ли Ваше мнение на повышение качества образовательных ресурсов, используемых при реализации программы?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Полностью удовлетворен', $p17_1),
          array('Частично удовлетворен', $p17_2),
          array('Не знаю', $p17_3),
          ),
    'options' => array('title' => 'Удовлетворенны ли Вы тем, что обучаетесь в данном вузе и на данном направлении подготовки(специальности)?', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>

<?php
echo GoogleChart::widget(array('visualization' => 'PieChart',
    'data' => array(
          array('Ответ', 'Кол-во ответивших'),
          array('Неудовлетворительно', $p18_1),
          array('Удовлетворительно', $p18_2),
          array('Хорошо', $p18_3),
          ),
    'options' => array('title' => 'Оцените, пожалуйста, качество образования в целом.', 'is3D' => 'true', 'height'=> '300', 'pieSliceText'=> 'value'))); ?>