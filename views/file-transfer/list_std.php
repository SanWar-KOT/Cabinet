<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FileTransferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информационно-образовательная среда';
$this->params['breadcrumbs'][] = $this->title;
?>
 
<script type="text/javascript">
var BrowserDetect = {
        init: function () {
            this.browser = this.searchString(this.dataBrowser) || "Other";
            this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
        },
        searchString: function (data) {
            for (var i = 0; i < data.length; i++) {
                var dataString = data[i].string;
                this.versionSearchString = data[i].subString;

                if (dataString.indexOf(data[i].subString) !== -1) {
                    return data[i].identity;
                }
            }
        },
        searchVersion: function (dataString) {
            var index = dataString.indexOf(this.versionSearchString);
            if (index === -1) {
                return;
            }

            var rv = dataString.indexOf("rv:");
            if (this.versionSearchString === "Trident" && rv !== -1) {
                return parseFloat(dataString.substring(rv + 3));
            } else {
                return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
            }
        },

        dataBrowser: [
            {string: navigator.userAgent, subString: "Edge", identity: "MS Edge"},
            {string: navigator.userAgent, subString: "MSIE", identity: "Explorer"},
            {string: navigator.userAgent, subString: "Trident", identity: "Explorer"},
            {string: navigator.userAgent, subString: "Firefox", identity: "Firefox"},
            {string: navigator.userAgent, subString: "Opera", identity: "Opera"},  
            {string: navigator.userAgent, subString: "OPR", identity: "Opera"},  

            {string: navigator.userAgent, subString: "Chrome", identity: "Chrome"}, 
            {string: navigator.userAgent, subString: "Safari", identity: "Safari"}       
        ]
    };
    
    BrowserDetect.init();
	if (BrowserDetect.browser == "Explorer"){
    document.write("<h3>Браузер Internet Explorer не отображает загруженные вами файлы, рекомендуется использовать другой браузер.</h3>");}
</script>
 
<div class="file-transfer-index">
    <h3 style="margin-top: 50px;">Для управления файлами, выберите дисциплину</h3>

    <div id="file_transfer">
        <span>Дисциплина:</span>
        <select id="predmet_main" data-user="<?=Yii::$app->user->identity->login?>">
            <option></option>
            <?php foreach ($dsp as $dp) {?>
			<?php if (substr_count($dp->group,Yii::$app->user->identity->group)>0) { ?>
             <option value="<?=$dp->predmet?>"><?=$dp->predmet?></option>
            <?php } }?>
        </select>
        
        
        <div class="action_zone">

        </div>
        <a href="#add_files" class="add_file" data-user="<?=Yii::$app->user->identity->login?>" class="file_action add_file">(добавить файл)</a>
    </div>
</div>

<div id="add_files" class="modalDialog">
	<div>
		<a href="#close" title="Закрыть" class="close">X</a>
		<h2>Добавление файла</h2>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
            	echo $form->field($model, 'type_file')->dropDownList([
                1 => 'КР/КП'
            ]);
            ?>
        <input type="hidden" id="uploadform-student" name="UploadForm[student]" value="<?=Yii::$app->user->identity->login?>"  /> 
        <input type="hidden"  id="uploadform-predmet" name="UploadForm[predmet]" />   
        <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true]) ?>
    
        <button>Загрузить</button>
    
     <?php ActiveForm::end() ?>
	</div>
</div>


<script type="text/javascript">
    $("document").ready(function(){
        $('#predmet_main').change(function(){
           var head_list = $('.action_zone');
           head_list.html('');
             var user = $(this).data("user"), predmet = $('#predmet_main').val();
                     $.ajax({
                      url: "/file-transfer/load_list?student="+user+"&dsp="+predmet,
                      success: function(data){
                       head_list.append(data);
                      }
                    });
        });
        
       $('.add_file').click(function(){
                var predmet = $('#predmet_main').val();
                $('#uploadform-predmet').val(predmet);
       });
    });
</script>
