<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LookupPusatPengajian;
use app\models\LookupPeringkatGaji;
use app\models\LookupTanggaGaji;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */
/* @var $form yii\widgets\ActiveForm */
$tahfiz = ArrayHelper::map(LookupPusatPengajian::find()->orderBy(['pusat_pengajian'=>SORT_ASC])->asArray()->all(),'id','pusat_pengajian'); //retrieve data for dropdown
$peringkatgaji = ArrayHelper::map(LookupPeringkatGaji::find()->orderBy(['peringkat_gaji'=>SORT_ASC])->asArray()->all(),'id','peringkat_gaji');
$tanggagaji = ArrayHelper::map(LookupTanggaGaji::find()->orderBy(['id'=>SORT_ASC])->asArray()->all(),'id','tangga_gaji');
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Form Stuff</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#">
                        <i class="icon-bell"></i> Action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-shield"></i> Another action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-user"></i> Something else here</a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="#">
                        <i class="icon-bag"></i> Separated link</a>
                </li>
            </ul>
        </div>
    </div>
</div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> Form Wizard
        <small>form wizard sample</small>
    </h1>
    <div class="row">
        <div class="col-md-12">
            <div class="m-heading-1 border-green m-bordered">
                <h3>Twitter Bootstrap Wizard Plugin</h3>
                <p> This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to hook into
                    each step individually. </p>
                <p> For more info please check out
                    <a class="btn red btn-outline" href="http://vadimg.com/twitter-bootstrap-wizard-example" target="_blank">the official documentation</a>
                </p>
            </div>
            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-red"></i>
                        <span class="caption-subject font-red bold uppercase"> Form Wizard -
                            <span class="step-title"> Step 1 of 4 </span>
                        </span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <?php $form = ActiveForm::begin(
                        [
                            'options' => [
                                'class' => 'form-horizontal',
                                'id' => 'submit_form',
                            ],
                        ]
                    ); ?>  

                    <!-- <form class="form-horizontal" action="#" id="submit_form" method="POST"> -->
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li>
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="number"> 1 </span>
                                            <span class="desc">
                                                <i class="fa fa-check"></i> Maklumat Peribadi </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="number"> 2 </span>
                                            <span class="desc">
                                                <i class="fa fa-check"></i> Maklumat Kewangan </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="number"> 4 </span>
                                            <span class="desc">
                                                <i class="fa fa-check"></i> Confirm </span>
                                        </a>
                                    </li>
                                </ul>
                                
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-success"> </div>
                                </div>
                                <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <h3 class="block">Berikan Maklumat Kakitangan</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Rujukan Tawaran</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'rujukan_tawaran')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nama Kakitangan
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'Cth : Ahmad Bin Abdullah'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nombor Kad Pengenalan
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_kp')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'Cth : 123456789012 (tanpa " - ")'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nombor Pekerja
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_pekerja')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'Cth : TSB000'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Warganegara
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'warganegara')->dropDownList(
                                                        [
                                                            'Warganegara'=>'Warganegara',
                                                            'Bukan Warganegara'=>'Bukan Warganegara',
                                                        ], 
                                                        [
                                                            'prompt'=>'Sila Pilih'
                                                        ]
                                                    )->label(false)
                                                ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tarikh Mula Kerja
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tarikh_mula_kerja')->textInput(['maxlength' => true,'class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tarikh Lahir
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tarikh_lahir')->textInput(['maxlength' => true,'class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Jawatan
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'jawatan_sekarang')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tahfiz
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tahfiz')->dropDownList($tahfiz, 
                                                        [
                                                            'prompt'=>'Sila Pilih'
                                                        ]
                                                    )->label(false)
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alamat Tempat Kerja
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'alamat_tempat_kerja')->textArea(['class'=>'form-control','rows'=>5])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alamat Tetap
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'alamat_tetap')->textArea(['class'=>'form-control','rows'=>5])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alamat Surat Menyurat
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'alamat_surat_menyurat')->textArea(['class'=>'form-control','rows'=>5])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tempat Lahir
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tempat_lahir')->textArea(['class'=>'form-control','rows'=>5])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Telefon Rumah</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_tel_rumah')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Telefon Bimbit</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_tel_bimbit')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tinggi</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tinggi_cm')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Berat</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'berat_kg')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tahap Kesihatan</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tahap_kesihatan')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Pengesahan Kesihatan</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'pengesahan_kesihatan')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kecacatan</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'kecacatan')->dropDownList(
                                                        [
                                                            'Ya'=>'Ya',
                                                            'Tidak'=>'Tidak',
                                                        ], 
                                                        [
                                                            'prompt'=>'Sila Pilih'
                                                        ]
                                                    )->label(false)
                                                ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nyatakan Kecacatan</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'nyatakan_kecacatan')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nama Ketua Usrah</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'nama_ketua_usrah')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kumpulan Usrah</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'kumpulan_usrah')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Unit Usrah</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'unit_usrah')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">No Ahli Abim</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_ahli_abim')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nama Waris</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'nama_waris')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Hubungan Waris</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'hubungan_waris')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nombor Telefon Waris</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_tel_waris')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kelulusan Tertinggi</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'kelulusan_tertinggi')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Peratus KWSP</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'peratus_kwsp')->dropDownList(
                                                        [
                                                            '8'=>'8',
                                                            '11'=>'11',
                                                        ], 
                                                        [
                                                            'prompt'=>'Sila Pilih'
                                                        ]
                                                    )->label(false)
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <h3 class="block">Berikan Maklumat Kewangan Kakitangan</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Gaji Asas <span class="required"> * </span></label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'gaji_asas')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Peringkat Gaji
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'peringkat_gaji')->dropDownList($peringkatgaji, 
                                                        [
                                                            'prompt'=>'Sila Pilih'
                                                        ]
                                                    )->label(false)
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tangga Gaji
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tangga_gaji')->dropDownList($tanggagaji, 
                                                        [
                                                            'prompt'=>'Sila Pilih'
                                                        ]
                                                    )->label(false)
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Skim Gaji <span class="required"> * </span></label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'skim_gaji')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Skim Mula <span class="required"> * </span></label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'skim_gaji_awal')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <h3 class="block">Confirm your account</h3>
                                        <h4 class="form-section">Account</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Username:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="MaklumatKakitangan[nama]"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="email"> </p>
                                            </div>
                                        </div>
                                        <h4 class="form-section">Profile</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Fullname:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="fullname"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Gender:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="gender"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Phone:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="phone"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="address"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">City/Town:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="city"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Country:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="country"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Remarks:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="remarks"> </p>
                                            </div>
                                        </div>
                                        <h4 class="form-section">Billing</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Card Holder Name:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="card_name"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Card Number:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="card_number"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">CVC:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="card_cvc"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Expiration:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="card_expiry_date"> </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Payment Options:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="payment[]"> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i> Back </a>
                                        <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <a href="javascript:;" class="btn green button-submit"> Submit
                                            <i class="fa fa-check"></i>
                                        </a>
                                        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success button-submit' : 'btn btn-primary']) ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>