<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Cuti';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Laporan <small>Cuti</small></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-calendar"></i>Laporan Cuti <?php echo date("F Y",strtotime($tarikh)); ?>
                </div>
                <div class="actions">
                    <?= Html::a('Cetak <i class="fa fa-print"></i>', ['cetak_laporan_cuti','tahun'=>$tahun,'bulan'=>$bulan], ['class' => 'btn dark btn-outline btn-sm','target'=>'_BLANK']) ?>
                </div>
            </div>
            <center>
            <?php $form = ActiveForm::begin([
            	'action' => ['laporan_cuti'],
            	'method' => 'GET',
            	'options' => [
                'class' => 'form-horizontal'
             ]
            ]); ?>
            	<div class="row">
				    <div class="portlet-body form">
				        <div class="form-body">
					        <div class="form-group">
	                            <label class="col-md-3 control-label">Tahun</label>
	                            <div class="col-md-6">
	                                <select class="form-control" name="tahun">
	                                <?php
	                                	$tahunsemasa = date("Y",strtotime($tarikh));
	                                	$tahun = date("Y",time());
	                                	if ($tahunsemasa == $tahun) {
							                for($y=$tahun;$y>=2012;$y--)
							                { 
								                 // $options[$y] = $y;
								    ?>
	                                    <option value="<?= $y ?>" <?php if ($tahun == $y){ echo 'selected';} ?>><?= $y ?></option>
	                                <?php 
	                                		}
	                                	}else{
	                                		for($y=$tahun;$y>=2012;$y--)
							                {
	                                ?>
	                                	<option value="<?= $y ?>" <?php if ($tahunsemasa == $y){ echo 'selected';} ?>><?= $y ?></option>
	                                <?php } }?>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-3 control-label">Bulan</label>
	                            <div class="col-md-6">
	                                <select class="form-control" name="bulan">
	                                <?php
	                                	$bulansemasa = date("n",strtotime($tarikh));
	                                	$bulan = date("n",time());
	                                	if ($bulansemasa == $bulan) {
							                for($m=1;$m<=12;$m++)
							                { 
								                 // $options[$m] = $m;
								    ?>
	                                    <option value="<?= $m ?>" <?php if ($bulan == $m){ echo 'selected';} ?> ><?= $m ?></option>
	                                <?php 
	                                		}
	                                	}else{
	                                		for($m=1;$m<=12;$m++)
							                { 
	                                ?>
	                                	<option value="<?= $m ?>" <?php if ($bulansemasa == $m){ echo 'selected';} ?> ><?= $m ?></option>
	                                <?php } }?>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-sm-2 control-label"></label>
	                            <div class="col-md-3">
	                                <input type="submit" class="btn btn-primary" value="Lihat Laporan">
	                            </div>
	                        </div>
				        </div>
				    </div>
				</div>
			<?php ActiveForm::end(); ?>
            </center>
            
        </div>
    </div>
</div>
<!-- result -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Nama Kakitangan</th>
                        <th>Nombor Pekerja</th>
                        <th>Jenis Cuti</th>
                        <th>Bilangan Cuti (Hari)</th>
                    </tr>
                    <?php
                        if (empty($model)) {
                    ?>
                        <tr>
                            <td colspan='3'><i>Tiada Rekod Di Jumpai</i></td>
                        </tr>
                    <?php 
                        }
                        else{
                        	foreach ($model as $value) {
                    ?>
                    	<tr>
                    		<td><?= $value['nama'] ?></td>
                    		<td><?= $value['no_pekerja']?></td>
                    		<td><?= $value['jenis_cuti']?></td>
                    		<td><?= $value['bilangan_cuti'] ?></td>
                    		<td></td>
                    	</tr>
                    <?php 
                    		}
                    	}
                    ?>
                    
                </table>
            </div>
        </div>
    </div>
</div>