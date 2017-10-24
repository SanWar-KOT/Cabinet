<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = "Ход реализации образовательного процесса";
$this->params['breadcrumbs'][] = ['label' => 'Портфолио', 'url' => ['users/view/'.Yii::$app->user->identity->FIO]];
$this->params['breadcrumbs'][] = "Учебный процесс";
?>

<script type="text/javascript">
    $("document").ready(function(){ 
   
        $('#semestr_head li').click(function() {
		$('#reit').css('display', 'none');
           var semestr = $(this).data('semestr');
           $('#main_osenki .semestrs').css('display', 'none');
           $('#main_osenki .semestr_'+semestr).css('display', 'table-row');
		   var i = 1;
		   for (i=1; i<10; i++){
		   $('#reit_'+i).css('display', 'none');
		   $('#reit1_'+i).css('display', 'none');
		   }
		   $('#reit_'+semestr).css('display', 'block');
		   $('#reit1_'+semestr).css('display', 'inline');
		  // $('#reit1').css('display', 'inline');
        });
    });
</script>
<div class="users-view">

    <h1>Фиксация хода образовательного процесса</h1>

    <p style="margin: 50px 30px -20px;">Выберите доступный семестр</p>

    <ul id="semestr_head" class="list-inline" style="margin: 50px 30px -20px;">
         <?php 
             $i = $osenki[0]->semestr;
			//$i=0;
            foreach ($osenki as $semestr){
				//if ($semestr->semestr > $i ) $i++;
                if ($semestr->semestr == $i) {
				 $i++;	
				?>
                  <li data-semestr="<?=$semestr->semestr?>" style="cursor: pointer; color: #2a6496;"><?=$semestr->semestr?> семестр</li>
			   <?php }
				if ($semestr->semestr > $i) { $i = $semestr->semestr; }
			   }?>   
    </ul>
    <h4 style="border-bottom: 1px solid #f5f5f5; padding: 40px 20px 20px;">Результаты освоения ОПОП (программы бакалавриата):</h4>
    
    <div style="padding: 10px;">
        <table style="width: 100%;" id="main_osenki">
            <tr>
                <th></th><th colspan="2">Результаты текущего контроля</th><th colspan="2">Результаты промежуточной аттестации</th>
            </tr>
			<tr>
			<th>Наименование дисциплины</th>
			</tr>
			<tr>
                <th></th><th>баллы</th><th>оценка</th><th>баллы</th><th>оценка</th>
            </tr>
			<?php 
			$sum=array(); $new_sum=array(); $j=array(); $j1=array(); $vivod=array(); $itog=0; 
			for ($i=1;$i<10;$i++){
				$vivod[$i]=true;
			}
            foreach ($osenki as $semestr){
			$sum[$semestr->semestr]=$sum[$semestr->semestr]+$semestr->balli_rpa;
			$j[$semestr->semestr]++;
			if ($semestr->resultat != 'зачтено') {
				$j1[$semestr->semestr]++;
				$new_sum[$semestr->semestr]=$new_sum[$semestr->semestr]+$semestr->resultat;
			}
			if ($semestr->resultat == 'академическая задолженность') {$vivod[$semestr->semestr]=false;}	?>
                        <tr class="semestr_<?=$semestr->semestr?> semestrs" style="display: none;">
                            <td><?=$semestr->predmet?></td>
							<td><?=$semestr->balli_rtk?></td>
							<td><?=$semestr->osenka_rtk?></td>
							<td><?=$semestr->balli_rpa?></td>
							<td><?=$semestr->resultat?></td>
                        </tr>
						
         <?php } ?>
        </table>
<p>&nbsp;</p>
	<?php foreach($sum as $key => $value) { 
	if ($vivod[$key]==true) { 
	?>
	 <p id="reit_<?=$key?>" style="display: none;" >Рейтинг студента за <?=$key?> семестр: <?= printf("%04.2f", $itog = $value/$j[$key])  ?></p>
	 <p id="reit1_<?=$key?>" style="display: none;" >Средний балл студента за <?=$key?> семестр: <?= printf("%02.2f", $itog1 = $new_sum[$key] / $j1[$key])  ?></p>
	<?php } else {?> <p id="reit_<?=$key?>" style="display: none;">У Вас имеются Академические задолжности</p> <?php }}?>
    </div>
</div>

