<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LookupStatusPekerjaan;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Kemaskini Status Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Pengurusan Kakitangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Senarai Maklumat Kakitangan Yang Telah Berhenti', 'url' => ['resign']];
$this->params['breadcrumbs'][] = $this->title;

$status = ArrayHelper::map(LookupStatusPekerjaan::find()->asArray()->all(),'id','status_pekerjaan'); //retrieve data for dropdown

?>
<div class='row'>
    <div class="col-md-12">
        <div class="note note-danger">
            <p> NOTA: Ruangan Yang Bertanda * Wajib Di Isi.</p>
        </div>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-briefcase font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Tukar Status Pekerjaan </span>
                </div>
                <div class="actions">
                                    <!---->
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="maklumat-kakitangan-form">

                    <?php $form = ActiveForm::begin([
                            'options' => [
                                'class' => 'form-horizontal',
                            ],
                        ]); ?>  
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Nama Kakitangan</label>
                        <div class="col-md-8">
                            <?= $form->field($model, 'nama')->textInput(['maxlength' => true,'class'=>'form-control','disabled'=>''])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Status Pekerjaan</label>
                        <div class="col-md-8">
                            <?= $form->field($model, 'status_pekerjaan')->dropDownList($status, 
                                    [
                                        'prompt'=>'Sila Pilih'
                                    ]
                                )->label(false)
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Tarikh Berhenti Kerja</label>
                        <div class="col-md-8">
                            <?= $form->field($model, 'tarikh_resign')->textInput(['maxlength' => true,'class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd'])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-8">
                            <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            <?= Html::a('<span class="hidden-xs">Kembali </span>', ['index'], ['class' => 'btn btn-default']) ?>

                        </div>
                        
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>
        </div>
    </div>
</div>

