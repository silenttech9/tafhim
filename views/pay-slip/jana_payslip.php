<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PaySlip;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Jana Slip Gaji';
$this->params['breadcrumbs'][] = ['label' => 'Rekod Pay Slip Bulanan', 'url' => ['proses_gaji']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Jana Gaji<small> <?php echo date("F Y",strtotime($tarikh));?></small></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
    	<div class="portlet light bordered ">
    		<div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-list"></i>Jana Gaji Bulan <?php echo date("F Y",strtotime($tarikh)); ?>
                </div>
            </div>
            <?php if(Yii::$app->session->hasFlash('payslip-success')):?>
	            <div class="alert alert-success">
	                <button type="button" class="close" data-dismiss="alert"></button>
	                 <?php echo  Yii::$app->session->getFlash('payslip-success'); ?>
	            </div>
	        <?php endif; ?>
    		<div class="portlet-body">
    		
    		<?php 
    			if ($total == $payslip) {
    		?>
    			<div class="note note-danger">
	                <h4> Slip gaji bulan <?php echo date("F Y",strtotime($tarikh));?> telah di jana. Harap maklum. </h4>
	            </div>
    		<?php 
    			} 
    			else{
    		?>
    			<table class="table table-striped table-hover">
    				<tr>
    					<th>Nama</th>
    					<th>No Pekerja</th>
    					<th>Tindakan</th>
    				</tr>
    				<?php
    					foreach ($staff as $key => $value) {
    						$slip = PaySlip::find()
    								->where(['staff_id'=> $value['id_staf']])
    								->andWhere(['tarikhmasa'=>$tarikh])
    								->one();
    						if (empty($slip)) {
    				?>
    				<tr>
    					<td><?php echo $value['nama']; ?></td>
    					<td><?php echo $value['no_pekerja']; ?></td>
    					<td>
    					<?= Html::a('Jana', ['generate_gajiform','id'=>$value['id_staf'],'tahun'=>$tahun,'bulan'=>$bulan,'referer'=>'bulansemasa'], ['class' => 'btn blue btn-sm','title'=>'Jana']) ?>
    					</td>
    				</tr>
    				<?php 
    						}
    						else{
    				?>
    				<tr style="display:none;">
    					<td></td>
    				</tr>

    				<?php 
    						}
    					}
    				?>
    			</table>
    		<?php } ?>
    		</div>
    	</div>
    </div>
</div>