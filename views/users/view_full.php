<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->FIO;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->FIO;
?>
<div class="users-view">

<h1><?= Html::encode($model->FIO) ?></h1>
<div class="body-content breadcrumb">
<?php if (Yii::$app->user->identity->role == 1 ) { ?>
        <div class="row">
            <div class="col-lg-4">
                <p>Группа</p>
                <p>Направление подготовки</p>
                <p>Профиль</p>
				<p>Дополнительная информация</p>

     </div>
            <div class="col-lg-6">
                <p><?=$model->group?></p>
                <p><?=$model->naprav?></p>
				<p>"<?=$model->profil?>"</p>
		<p> <a href= <?=$model->plan?> >Учебный план <?=$model->profil?> <br />
<?php
$secretkey = "57Kfr79xj8Px4W9Hnk9Mst8fWNdXgbGJ";
$domain = "cabinet.orenburg-atiso.ru";

$timestamp = date('YmdHis');
$signature = md5(300 . $secretkey . $timestamp);
$params = array(
    'domain' => $domain,
    'id' => 300,
    'time' => $timestamp, 
    'sign' => $signature,
    'ut' => 1); 

//$url = new moodle_url('http://www.iprbookshop.ru/autologin', $params);
if ($model->profil == "Финансы и кредит") {
$new_url = "https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=685&Itemid=216";
}
elseif ($model->profil == "Бухгалтерский учет, анализ и аудит") {
$new_url = "https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=684&Itemid=216";
}
elseif ($model->profil == "Экономика труда") {
$new_url = "https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=683&Itemid=216";
}
elseif ($model->profil == "Менеджмент организации") {
$new_url = "https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=686&Itemid=216";
}
elseif ($model->profil == "Государственное и муниципальное управление") {
$new_url = "https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=688&Itemid=216";
}
elseif ($model->profil == "Управление персоналом организации") {
$new_url = "https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=689&Itemid=216";
}
elseif ($model->profil == "Управление социальным развитием организации") {
$new_url = "https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=690&Itemid=216";
}

?> 
<a href= <?=$new_url?> >Рабочие программы дисциплин<br />
<a href= <?=$new_url?> >Рабочие программы практик<br />
<a href="http://www.iprbookshop.ru/autologin?&domain=<?php echo $domain ?>&id=300&time=<?php echo $timestamp ?>&sign=<?php echo $signature ?>">Электронно-библиотечная система iprbook</a><br />
					<a href="http://biblioclub.ru">Электронно-библиотечная система Университетска библиотека ONLINE</a><br />
					<?php if ($model->login_bibl != null ) { ?>
					Данные для доступа в Университетскую библиотеку ONLINE <br />
					Логин: <?=$model->login_bibl?> <br />
					Пароль: <?=$model->pass_bibl?> <br />
					<?php } ?>  
					<a href="https://www.orenfil-atiso.ru/index.php?option=com_content&view=article&id=733&Itemid=1">Электронные образовательные ресурсы</a><br />
                </p>
           </div>
        </div>
		
		<div align=center>
		<?php if ($model->yvedoml1 != null ) { ?> <a href="/dolgi/<?=$model->yvedoml1?>" target="_blank"><img src="/dolgi/<?=$model->yvedoml1?>" alt="задолжность" width=400 /></a><br><?php } ?> 
		<?php if ($model->yvedoml2 != null ) { ?> <a href="/dolgi/<?=$model->yvedoml2?>" target="_blank"><img src="/dolgi/<?=$model->yvedoml2?>" alt="задолжность" width=400 /></a><?php } ?> 
		</div>
<?php } ?> 
<?php if (Yii::$app->user->identity->role == 2 || Yii::$app->user->identity->role == 3) { ?>
<h3>Уважаемые преподователи!</h3>
<p>Перед началом работы в личном кабинете рекомендуется ознакомиться с "Инструкцией по работе в личном кабинете студента и в личном кабинете преподавателя".</p>   

    <?php

$domain = "cabinet.orenburg-atiso.ru";

$timestamp = date('YmdHis');
$signature = md5(300 . $secretkey . $timestamp);
$params = array(
    'domain' => $domain,
    'id' => 300,
    'time' => $timestamp, 
    'sign' => $signature,
    'ut' => 1); 

//$url = new moodle_url('http://www.iprbookshop.ru/autologin', $params);
?> 
<a href="http://biblioclub.ru">Электронно-библиотечная система Университетска библиотека ONLINE</a><br />
<a href="http://www.iprbookshop.ru/autologin?&domain=<?php echo $domain ?>&id=300&time=<?php echo $timestamp ?>&sign=<?php echo $signature ?>">Электронно-библиотечная система iprbook</a><br />   
<?php } ?>   
	</div>
</div>


