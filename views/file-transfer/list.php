<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FileTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информационно-образовательная среда';
$this->params['breadcrumbs'][] = $this->title;
?>
  
<div class="file-transfer-index">
    <h3 style="margin-top: 50px;">Для управления файлами, выберите дисциплину <?= $sveta ?></h3>

    <div id="file_transfer">
        <span>Дисциплина:</span>
        <select id="predmet_main">
            <option></option>
            <?php foreach ($dsp as $dp) { ?>
	<?php if (((Yii::$app->user->identity->FIO==$dp->prepod1) || (Yii::$app->user->identity->FIO==$dp->prepod2) || (Yii::$app->user->identity->role == 3)) && ((substr_count($dp->group,"К")>0) || ($dp->predmet=='Учебная практика')|| ($dp->predmet=='Производственная практика') || ($dp->predmet=='Преддипломная практика'))){ ?> 
	<option value="<?=$dp->predmet?>"><?=$dp->predmet?></option> 
	<?php } ?>
            <?php if (((Yii::$app->user->identity->FIO=='Припадчева Л.В.')|| (Yii::$app->user->identity->FIO=='Цыгулева М.И.') || (Yii::$app->user->identity->FIO=='Носаева В.В.') || (Yii::$app->user->identity->FIO=='Трунина О.Ю.') || (Yii::$app->user->identity->FIO=='Реброва Т.А.') || (Yii::$app->user->identity->FIO=='Ситкова М.П.') || (Yii::$app->user->identity->FIO=='Слепцова Н.С.') || (Yii::$app->user->identity->FIO=='Выголова И.Н.') || (Yii::$app->user->identity->FIO=='Мажаров Р.А.') || (Yii::$app->user->identity->FIO=='Мажарова Н.А.') || (Yii::$app->user->identity->FIO=='Галактионова Л.М.')) && (($dp->predmet=='Учебная практика') || ($dp->predmet=='Производственная практика') || ($dp->predmet=='Преддипломная практика'))){ ?> 
		<option value="<?=$dp->predmet?>"><?=$dp->predmet?></option>
			<?php } ?>
			
			
		<?php if (((Yii::$app->user->identity->FIO=='Ситкова М.П.') || (Yii::$app->user->identity->FIO=='Цыгулева М.И.') || (Yii::$app->user->identity->FIO=='Трунина О.Ю.') || (Yii::$app->user->identity->FIO=='Спешилова Н.В.') || (Yii::$app->user->identity->FIO=='Реброва Т.А.') || (Yii::$app->user->identity->FIO=='Выголова И.Н.') || (Yii::$app->user->identity->FIO=='Галактионова Л.М.') || (Yii::$app->user->identity->FIO=='Припадчева Л.В.') || (Yii::$app->user->identity->FIO=='Носаева В.В.')) && (($dp->predmet=='Научно-исследовательская работа'))){ ?> 
		<option value="<?=$dp->predmet?>"><?=$dp->predmet?></option>
			<?php } } ?>
        </select>
        

        
        <div class="action_zone">

        </div>
        
    </div>
</div>

<div id="add_files" class="modalDialog">
	<div>
		<a href="#close" title="Закрыть" class="close">X</a>
		<h2>Добавление файла</h2>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
            	echo $form->field($model, 'type_file')->dropDownList([
                1 => 'КР/КП',
                2 => 'Отзыв',
                3 =>'Рецензия'
            ]);
            ?>
        <input type="hidden" id="uploadform-student" name="UploadForm[student]" value="<?=Yii::$app->user->identity->login?>"  /> 
        <input type="hidden"  id="uploadform-predmet" name="UploadForm[predmet]" />   
        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]) ?>
    
        <button>Загрузить</button>
    
     <?php ActiveForm::end() ?>
	</div>
</div>

<div id="delete_files" class="modalDialog">
	<div>
		<a href="#close" title="Закрыть" class="close">X</a>
		<h4>Подтвердите удаление</h4>
        <a  id="delete_path" href="/file-transfer/delete?id=">Удалить</a>
	</div>
</div>

<script type="text/javascript">
    $("document").ready(function(){ 
            $('.action_zone').on('click', '.active_li span', function(e){
                $(this).parent().children('ul').remove();
                $(this).parent().removeClass('active_li');
                $(this).parent().addClass('passive_li');
            });
            $('.action_zone').on('click', '.passive_li span', function(e){
                var head_list = $(this).parent();
                   $(this).parent().children('ul').css('display', 'block');
                     $(this).parent().removeClass('passive_li');
                     $(this).parent().addClass('active_li');
                      
                     var group =$(this).text();
                     $.ajax({
                      url: "/file-transfer/load_students?group="+group,
                      success: function(data){
                       head_list.append(data);
                      }
                    });
            });
            
            $('.action_zone').on('click', '.active_tbl', function(e){
                 $(this).parent().children('table').remove();
                $(this).removeClass('active_tbl');
                $(this).addClass('passive_tbl');
            });
            $('.action_zone').on('click', '.passive_tbl', function(e){
                  var head_list = $(this);
                   $(this).children('table').css('display', 'block');
                     $(this).removeClass('passive_tbl');
                     $(this).addClass('active_tbl');
                     
                  var user = $(this).data("user"), predmet = $('#predmet_main').val();
                     $.ajax({
                      url: "/file-transfer/load_list?student="+user+"&dsp="+predmet,
                      success: function(data){
                       head_list.append(data);
                      }
                    });
            });
            
         
           $('#predmet_main').change(function(){
                  $('.action_zone li').children('ul').remove();
                  $('.action_zone li').remove();
				  $('.action_zone li').removeClass('active_li');
                  $('.action_zone li').addClass('passive_li'); 
				predmet = $('#predmet_main').val();
				var head_list = $(this); 
                    $.ajax({ 						
                      url: "/file-transfer/load_groups?predmet="+predmet,
                      success: function(data){  
                      $('.action_zone').append(data);
                      }
                    });
           });
         
            $('.action_zone').on('click', '.add_file', function(e){
                var user = $(this).data("user"), predmet = $('#predmet_main').val();
                $('#uploadform-student').val(user);
                $('#uploadform-predmet').val(predmet);
            });
            
            $('.action_zone').on('click', '.delete', function(e){
                var file = $(this).data("file");
                $('#delete_path').attr('href', '/file-transfer/delete?id='+file);
            });
        
    });
</script>