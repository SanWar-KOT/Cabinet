<?php
/* @var $this yii\web\View */
$this->title = 'Академия труда и социальных отношений';
?>
<div class="site-index">
<?php
  if (Yii::$app->user->isGuest) {
  header('Location: https://cabinet.orenburg-atiso.ru/site/login', true, 301);
  } else {header('Location: https://cabinet.orenburg-atiso.ru/users/view/'.Yii::$app->user->identity->FIO, true, 301);}
?>
</div>