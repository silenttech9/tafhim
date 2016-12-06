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

$this->title = 'Tambah Kakitangan';
$this->params['breadcrumbs'][] = ['label' => 'Pengurusan Kakitangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
        <div class="col-md-12">
            <br>
            <div class="m-heading-1 border-green m-bordered">
                <h3>Tambah Maklumat Kakitangan</h3>
                NOTA: Ruangan Yang Bertanda (<span style="color:red;"> * </span>) Wajib Di Isi.
            </div>
            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-user font-green-haze"></i>
                        <span class="caption-subject font-green-haze bold uppercase"> Maklumat Kakitangan 
                        </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <?php $form = ActiveForm::begin(
                        [
                            'options' => [
                                'class' => 'form-horizontal',
                                'id' => 'submit_form',
                                ['enctype' => 'multipart/form-data'],
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
                                        <a href="#tab3" data-toggle="tab" class="step">
                                            <span class="number"> 2 </span>
                                            <span class="desc">
                                                <i class="fa fa-check"></i> Muat Turun Gambar </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="number"> 3 </span>
                                            <span class="desc">
                                                <i class="fa fa-check"></i> Pengesahan </span>
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
                                            <label class="control-label col-md-3">Peratus KWSP
                                                <span class="required"> * </span>
                                            </label>
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
                                            <label class="control-label col-md-3">Gaji Asas 
                                                <span class="required"> * </span>
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
                                        
                                    </div>
                                    <div class="tab-pane" id=tab3>
                                        <h3 class="block">Anda di minta untuk memuat naik gambar Kakitangan</h3>
                                        <center>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <img id="image_upload_preview" src="<?php echo Yii::$app->request->baseUrl; ?>/image/no-image.png?>" alt="your image" height='300' width='300' />
                                                        
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
                                            </div>
                                            
                                        </center>
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <h3 class="block">Pengesahan</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light bordered ">
                                                    <div class="portlet-title">
                                                        <div class="caption font-green-haze">

                                                            <span class="caption-subject bold uppercase">Maklumat Peribadi</span>
                                                        </div>
                                                         <div class="tools actions">
                                                                <a href="" class="expand"> </a>

                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Rujukan Tawaran : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[rujukan_tawaran]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Kakitangan : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[nama]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nombor Kad Pengenalan : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[no_kp]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nombor Pekerja :
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[no_pekerja]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Warganegara : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[warganegara]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tarikh Mula Kerja :
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[tarikh_mula_kerja]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tarikh Lahir : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[tarikh_lahir]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Jawatan :
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[jawatan_sekarang]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tahfiz : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[tahfiz]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Alamat Tempat Kerja : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[alamat_tempat_kerja]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Alamat Tetap : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[alamat_tetap]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Alamat Surat Menyurat : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[alamat_surat_menyurat]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tempat Lahir : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[tempat_lahir]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Telefon Rumah : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[no_tel_rumah]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Telefon Bimbit : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[no_tel_bimbit]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tinggi : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[tinggi_cm]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Berat : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[berat_kg]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tahap Kesihatan : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[tahap_kesihatan]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Pengesahan Kesihatan : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[pengesahan_kesihatan]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kecacatan : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[kecacatan]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nyatakan Kecacatan : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[nyatakan_kecacatan]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Ketua Usrah : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[nama_ketua_usrah]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kumpulan Usrah : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[kumpulan_usrah]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Unit Usrah : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[unit_usrah]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">No Ahli Abim : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[no_ahli_abim]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nama Waris : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[nama_waris]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Hubungan Waris : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[hubungan_waris]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nombor Telefon Waris : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[no_tel_waris]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Kelulusan Tertinggi : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[kelulusan_tertinggi]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Peratus KWSP : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[peratus_kwsp]"> </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light bordered ">
                                                    <div class="portlet-title">
                                                        <div class="caption font-green-haze">

                                                            <span class="caption-subject bold uppercase">Maklumat Kewangan</span>
                                                        </div>
                                                         <div class="tools actions">
                                                                <a href="" class="expand"> </a>

                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" style="display: none;">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Gaji Asas : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[gaji_asas]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Peringkat Gaji :
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[peringkat_gaji]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tangga Gaji : 
                                                            </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[tangga_gaji]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Skim Gaji : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[skim_gaji]"> </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Skim Mula : </label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static" data-display="MaklumatKakitangan[skim_gaji_awal]"> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a href="javascript:;" class="btn default button-previous">
                                            <i class="fa fa-angle-left"></i> Kembali </a>
                                        <a href="javascript:;" class="btn btn-outline green button-next"> Seterusnya
                                            <i class="fa fa-angle-right"></i>
                                        </a><!-- 
                                        <a href="javascript:;" class="btn green button-submit"> Submit
                                            <i class="fa fa-check"></i>
                                        </a> -->
                                        <?= Html::submitButton($model->isNewRecord ? 'Simpan <i class="fa fa-check"></i>' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success button-submit' : 'btn btn-primary']) ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
