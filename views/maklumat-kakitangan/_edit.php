<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\LookupPusatPengajian;
use app\models\LookupPeringkatGaji;
use app\models\LookupTanggaGaji;
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */

$this->title = 'Maklumat Kakitangan';
$this->params['breadcrumbs'][] = ['label' => 'Pengurusan Kakitangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$tahfiz = ArrayHelper::map(LookupPusatPengajian::find()->orderBy(['pusat_pengajian'=>SORT_ASC])->asArray()->all(),'id','pusat_pengajian'); //retrieve data for dropdown
$peringkatgaji = ArrayHelper::map(LookupPeringkatGaji::find()->orderBy(['peringkat_gaji'=>SORT_ASC])->asArray()->all(),'id','peringkat_gaji');
$tanggagaji = ArrayHelper::map(LookupTanggaGaji::find()->orderBy(['id'=>SORT_ASC])->asArray()->all(),'id','tangga_gaji');

?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Maklumat Kakitangan <small>Kemaskini Maklumat</small> </h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="mt-element-card ">
                    <div class="mt-card-item">
                        <div class="">
                             <center>
                                 <img src="<?=Yii::$app->request->BaseUrl.'/uploads/'.$model->foto ?>" height='300px' width='250px'>
                             </center>
                        </div>
                        <div class="mt-card-content">
                            <h3 class="mt-card-name"><?= $model->nama ?></h3>
                            <p class="mt-card-desc font-grey-mint"><?= $model->jawatan_sekarang?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <?= Html::a('<i class="icon-home"></i>Overview', ['view','id'=>$model->id_staf], ['class' => '']) ?>
                        </li>
                        <li class="active">
                            <?= Html::a('<i class="icon-pencil"></i>Kemaskini Maklumat', ['update','id'=>$model->id_staf], ['class' => '']) ?>
                        </li>
                        <li>
                            <?= Html::a('<i class="icon-arrow-left"></i>Senarai Kakitangan', ['index'], ['class' => '']) ?>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Maklumat Kakitangan</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Maklumat Peribadi</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">Maklumat Kewangan</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Kemaskini Gambar</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <?php $form = ActiveForm::begin(
                                        [
                                            'options' => [
                                                'class' => 'form-horizontal',
                                                'id' => 'submit_form',
                                            ],
                                        ]
                                    ); ?>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Rujukan Tawaran</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'rujukan_tawaran')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nama Kakitangan
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'nama')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'Cth : Ahmad Bin Abdullah'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nombor Kad Pengenalan
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_kp')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'Cth : 123456789012 (tanpa " - ")'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nombor Pekerja
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'no_pekerja')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'Cth : TSB000'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Warganegara
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
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tarikh_mula_kerja')->textInput(['maxlength' => true,'class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tarikh Lahir
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'tarikh_lahir')->textInput(['maxlength' => true,'class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Jawatan
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'jawatan_sekarang')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tahfiz
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
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'alamat_tempat_kerja')->textArea(['class'=>'form-control','rows'=>5])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alamat Tetap
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'alamat_tetap')->textArea(['class'=>'form-control','rows'=>5])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alamat Surat Menyurat
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
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-8">
                                                <?= Html::submitButton($model->isNewRecord ? 'Simpan <i class="fa fa-check"></i>' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success button-submit' : 'btn btn-primary']) ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                                
                                <div class="tab-pane" id="tab_1_2">
                                    <?php $form = ActiveForm::begin(
                                        [
                                            'options' => [
                                                'class' => 'form-horizontal',
                                                'id' => 'submit_form',
                                            ],
                                        ]
                                    ); ?>
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Gaji Asas
                                            </label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'gaji_asas')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Peringkat Gaji
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
                                            <label class="control-label col-md-3">Skim Gaji</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'skim_gaji')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Skim Mula</label>
                                            <div class="col-md-8">
                                                <?= $form->field($model, 'skim_gaji_awal')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false) ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-8">
                                                <?= Html::submitButton($model->isNewRecord ? 'Simpan <i class="fa fa-check"></i>' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success button-submit' : 'btn btn-primary']) ?>
                                            </div>
                                            
                                        </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                                <div class="tab-pane" id="tab_1_3">
                                    <?php $form = ActiveForm::begin(
                                        [
                                            'action' => ['updateimg','id'=>$model->id_staf],
                                            'method' => 'post',
                                            'options' => [
                                                'class' => 'form-horizontal',
                                                'id' => 'submit_form',
                                            ],
                                        ]
                                    ); ?>
                                        <center>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <img id="image_upload_preview" src="<?=Yii::$app->request->BaseUrl.'/uploads/'.$model->foto ?>" alt="your image" height='300' width='300' />
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-6">
                                                        <label id="muat" class="custom-file-input file-blue">

                                                        <!-- <input type="hidden" name="MaklumatKakitangan[file]" value="">
                                                        <input type="file" id="uploadBtn" class="inputFile" name="MaklumatKakitangan[file]"> -->
                                                            <?= $form->field($model, 'file')->fileInput(['class'=>"inputFile"])->label(false)?>
                                                        </label>
                                                        <a href="javascript:;" id="cancel" class="btn red" style="display:none;"> Buang </a>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"></label>
                                                    <div class="col-md-8">
                                                        <?= Html::submitButton($model->isNewRecord ? 'Simpan <i class="fa fa-check"></i>' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success button-submit' : 'btn btn-primary']) ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                        </center>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

