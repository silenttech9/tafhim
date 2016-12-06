<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Jana Pay Slip';
$this->params['breadcrumbs'][] = ['label' => 'Rekod Pay Slip Bulanan', 'url' => ['proses_gaji']];
$this->params['breadcrumbs'][] = ['label' => 'Senarai Kakitangan', 'url' => ['jana_payslip','tahun'=> $tahun,'bulan'=>$bulan]];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Jana Gaji</h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
    	<div class="portlet light bordered ">
    		<div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-list"></i>Jana Gaji Bulan <?php echo date("F Y",strtotime($tarikh)); ?>
                </div>
            </div>
            
            <div class="portlet-body">
            	<?php $form = ActiveForm::begin(
	        		[
	        			'options' => ['class' => 'form-horizontal']
	        		]); ?>
	        	<div class="form-body">
	        		<div class="form-group">
                        <label class="col-sm-3 control-label"><?= Html::activeLabel($model,'nama'); ?></label>
                            <div class="col-md-6">
                                <label class="control-label"><?= $model->nama ?></label>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?= Html::activeLabel($model,'no_pekerja'); ?></label>
                            <div class="col-md-6">
                                <label class="control-label"><?= $model->no_pekerja ?></label>
                                <span class="help-block"><?= Html::error($model,'no_pekerja'); ?></span>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?= Html::activeLabel($model,'gaji_asas'); ?></label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model,'gaji_asas',['class'=>'form-control']); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?= Html::activeLabel($model,'elaun_rumah'); ?></label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model,'elaun_rumah',['class'=>'form-control']); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?= Html::activeLabel($model,'elaun_asas'); ?></label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model,'elaun_asas',['class'=>'form-control']); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Gaji Kasar</label>
                            <div class="col-md-6">
                            	<label class="control-label">RM <?php echo number_format($model->gaji_asas + $model->elaun_asas + $model->elaun_rumah,2,'.','')?></label>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Hibah (+RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model2,'hibah',['class'=>'form-control','value'=>"0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Bonus (+RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model2,'bonus',['class'=>'form-control','value'=>"0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Lain-lain Tambahan (+RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model2,'lain_tambahan',['class'=>'form-control','value'=>"0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sewa Rumah (-RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model,'sewa_rumah',['class'=>'form-control','placeholder'=>"+RM 0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Gaji Tahan (-RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model,'gaji_tahan',['class'=>'form-control','placeholder'=>"+RM 0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tabung Haji (-RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model,'tabung_gaji',['class'=>'form-control','placeholder'=>"+RM 0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tabung Guru (-RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model,'tabung_guru',['class'=>'form-control','placeholder'=>"+RM 0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">KKSK (-RM)</label>
                            <div class="col-md-6">
                            	<input type="text" id="maklumatkakitangan-kksk" class="form-control" name="MaklumatKakitangan[kksk]" value="<?php echo number_format($model->kksk,2,'.','') ?>">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Loan (-RM)</label>
                            <div class="col-md-6">
                            	<input type="text" id="maklumatkakitangan-loan" class="form-control" name="MaklumatKakitangan[loan]" value="<?php echo number_format($model->loan,2,'.','') ?>">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Lain-lain Pemotongan (-RM)</label>
                            <div class="col-md-6">
                                <?= Html::activeTextInput($model2,'lain',['class'=>'form-control','value'=>"0.00"]); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">CTG (Hari)</label>
                            <div class="col-sm-2">
                                <?= Html::activeTextInput($model2,'ctg',['class'=>'form-control','value'=>"0"]); ?> 
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tarikh CTG</label>
                            <div class="col-sm-6">
                                <?= Html::activeTextInput($model2,'memo_ctg',['class'=>'form-control','placeholder'=>"Contoh: 15.01.2013, 16.01.2013"]); ?> 
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-6">
                                <input type="hidden" id="payslip-staff_id" class="form-control" name="payslip[staff_id]" value="<?= $model->id_staf?>">
                            </div>
                    </div>
                    <div class="form-group">
				        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Jana Gaji', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				        <?= Html::a('<span class="hidden-xs">Kembali </span>', ['jana_payslip','tahun'=>$tahun,'bulan'=>$bulan], ['class' => 'btn btn-default']) ?>
				    </div>
	        	</div>

	        	<?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>