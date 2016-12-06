<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use app\models\MaklumatKakitangan;
use app\models\LookupCuti;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatCuti */
/* @var $form yii\widgets\ActiveForm */
$nama = ArrayHelper::map(MaklumatKakitangan::find()->where(['status_pekerjaan'=>1])->asArray()->orderBy(['nama'=>SORT_ASC])->all(),'id_staf','nama'); //retrieve data for dropdown
$cuti = ArrayHelper::map(LookupCuti::find()->asArray()->orderBy(['id'=>SORT_ASC])->all(),'id','jenis_cuti');
?>

<div class="maklumat-cuti-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
    <div class="row">
        <div class="col-md-12">
            <label class="control-label" for="maklumatcuti-id_staff">Nama Kakitangan <span class="required">*</span></label>
            <?= Html::activeDropDownList($model, 'id_staff', $nama, 
                    [
                        'prompt'=>'--Sila Pilih--',
                        'class'=>'form-control',

                    ]); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <label class="control-label" for="maklumatcuti-sebab_cuti">Sebab Mahu Bercuti</label>
            <?= Html::activeTextArea($model,'sebab_cuti',['class'=>'form-control','rows'=>3]); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label class="control-label" for="maklumatcuti-jenis_cuti">Jenis Cuti <span class="required">*</span></label>
            <?= Html::activeDropDownList($model, 'jenis_cuti', $cuti, 
                    [
                        'prompt'=>'--Sila Pilih--',
                        'class'=>'form-control',

                    ]); ?>
        </div>
        <div class="col-md-3">
            <label class="control-label" for="maklumatcuti-tarikh_mula">Tarikh Mula <span class="required">*</span></label>
            <?= Html::activeTextInput($model,'tarikh_mula',['class'=>'form-control date-picker','data-date-format'=>'dd-mm-yyyy']); ?>
        </div>
        <div class="col-md-3">
            <label class="control-label" for="maklumatcuti-tarikh_akhir">Tarikh Akhir <span class="required">*</span></label>
            <?= Html::activeTextInput($model,'tarikh_akhir',['class'=>'form-control date-picker','data-date-format'=>'dd-mm-yyyy']); ?>
        </div>
        <div class="col-md-3">
            <label class="control-label" for="maklumatcuti-bilangan_cuti">Tempoh Cuti (Hari) <span class="required">*</span></label>
            <?= Html::activeTextInput($model,'bilangan_cuti',['class'=>'form-control','data-type'=>'float','type'=>'number']); ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('<span class="hidden-xs">Kembali </span>', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
