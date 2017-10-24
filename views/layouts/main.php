<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <div>
		<?php
            NavBar::begin([
                'brandLabel' => 'ОФ ОУП ВО АТиСО',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
      
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [                Yii::$app->user->isGuest ?
                        ['label' => 'Вход', 'url' => ['/site/login']] :
                        ['label' => 'Выход (' . Yii::$app->user->identity->FIO . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],]]);
            if (Yii::$app->user->identity->role == 1) {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
                ['label' => 'Главная', 'url' => ['/users/view/'.Yii::$app->user->identity->FIO]],
                ['label' => 'Ход ОП', 'url' => ['/osenki/view_user/'.Yii::$app->user->identity->FIO]],
				['label' => 'Банк заданий', 'url' => ['/site/about']],
				['label' => 'Анкета', 'url' => ['/anceta/index']],
				['label' => 'Портфолио', 'url' => ['/file-transfer/list_portf']],
                ['label' => 'И-O среда', 'url' => ['/file-transfer/list']],
				['label' => 'Вопрос-Ответ', 'url' => ['/site/contact']],
                ]]);
            }
			
   			if (Yii::$app->user->identity->FIO == 'Ситкова М.П.' || Yii::$app->user->identity->FIO == 'Мажарова Е.А.') {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
				['label' => 'Рейтинг итог', 'url' => ['/reitingprepod/indexzav']],
				]]);
            }
			
            if (Yii::$app->user->identity->role == 2 || Yii::$app->user->identity->role == 3) {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
				['label' => 'Главная', 'url' => ['/users/view/'.Yii::$app->user->identity->FIO]],
                ['label' => 'И-O среда', 'url' => ['/file-transfer/list']],
				['label' => 'Банк заданий', 'url' => ['/site/about']],
				['label' => 'Анкета', 'url' => ['/ancetaprepod/index']],
				['label' => 'Рейтинг', 'url' => ['/reitingprepod/index']],
				['label' => 'Вопрос-Ответ', 'url' => ['/site/contact']],
				]]);
            }

            if (Yii::$app->user->identity->role == 3) {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [ 
                ['label' => 'Группы', 'url' => ['/group']],
                ['label' => 'Предметы', 'url' => ['/predmeti']],
                ['label' => 'Оценки', 'url' => ['/osenki']],
                ['label' => 'Пользователи', 'url' => ['/users']],
				['label' => 'Рейтинг', 'url' => ['/reitingprepod/index'],
					'options'=>['class'=>'dropdown'],
					'items' => [
						['label' => 'Рейтинг преподавателей', 'url' => ['/reitingprepod/index']],
						['label' => 'Рейтинг преподавателей представление', 'url' => ['/reitingprepod/indexzav']],
						['label' => 'Таблица рейтинга', 'url' => ['/reitingprepod/table']],
			    ]], 
                ['label' => 'Анкетирование', 'url' => ['/anceta/index'],
                    'options'=>['class'=>'dropdown'],
                    'items' => [
                        ['label' => 'Анкетирование студентов', 'url' => ['/anceta/index']],
                        ['label' => 'Результаты анкетирования студентов', 'url' => ['/anceta/charts']],
                        ['label' => 'Анкета преподавателя', 'url' => ['/ancetaprepod/index']],
                ]],
				['label' => 'Файлы', 'url' => ['/file-transfer']],
                ]]);
            }
            NavBar::end();
        ?>
</div>



        <div class="container">

            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy;Оренбургский филиал ОУП ВО АТиСО <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
