<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */

$this->title = 'Kemaskini Payroll Kakitangan';
$this->params['breadcrumbs'][] = ['label' => 'Pengurusan Gaji Kakitangan', 'url' => ['pengurusan_gaji']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='row'>
	<div class="col-md-12">
		<h3 class="page-title">Pengurusan Gaji</h3>
		<div class="portlet light bordered">
			<div class="portlet-title">
	            <div class="caption font-green-haze">
	                <i class="icon-user font-green-haze"></i>
	                <span class="caption-subject bold uppercase">Kemaskini Payroll Kakitangan </span>
	            </div>
	            <div class="actions">
	                                <!---->
	                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	            </div>
	        </div>
	        <div class="portlet-body form">
	        	<?php $form = ActiveForm::begin(
	        		[
	        			'options' => ['class' => 'form-horizontal']
	        		]); ?>  
				    <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>

				    <div class="row">
				        <div class="portlet-body-form">
				            <div class="form-body">
				                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'peratus_kwsp'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeDropDownList($model, 'peratus_kwsp', 
				                            [
				                                '8'=>'8',
				                                '11'=>'11',
				                            ], 
				                            [
				                                'prompt'=>'--Sila Pilih--',
				                                'class'=>'form-control',

				                            ]); ?>
                                            <span class="help-block"><?= Html::error($model,'peratus_kwsp'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'gaji_asas'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'gaji_asas',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'gaji_asas'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'elaun_asas'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'elaun_asas',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'elaun_asas'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'elaun_rumah'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'elaun_rumah',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'elaun_rumah'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'tabung_gaji'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'tabung_gaji',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'tabung_gaji'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'tabung_guru'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'tabung_guru',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'tabung_guru'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'sewa_rumah'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'sewa_rumah',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'sewa_rumah'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'kksk'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'kksk',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'kksk'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'loan'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'loan',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'loan'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'gaji_tahan'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'gaji_tahan',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'gaji_tahan'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'acc_tabung_haji'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'acc_tabung_haji',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'acc_tabung_haji'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'no_kwsp'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'no_kwsp',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'no_kwsp'); ?></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?= Html::activeLabel($model,'acc_bimb'); ?></label>
                                        <div class="col-md-6">
                                            <?= Html::activeTextInput($model,'acc_bimb',['class'=>'form-control']); ?>
                                            <span class="help-block"><?= Html::error($model,'acc_bimb'); ?></span>
                                        </div>
                                </div>
				            </div>
				        </div>
				    </div>

				    <div class="form-group">
				        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				        <?= Html::a('<span class="hidden-xs">Kembali </span>', ['pengurusan_gaji'], ['class' => 'btn btn-default']) ?>
				    </div>

				    <?php ActiveForm::end(); ?>

	        </div>
		</div>
	</div>
</div>

