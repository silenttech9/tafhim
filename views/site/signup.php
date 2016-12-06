<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use yii\helpers\Url;

use app\models\LookupPendapatan;
use app\models\LookupPusatPengajian;

$pendapatan = ArrayHelper::map(LookupPendapatan::find()->asArray()->all(), 'id', 'pendapatan');
$pengajian = ArrayHelper::map(LookupPusatPengajian::find()->asArray()->all(), 'id', 'pusat_pengajian');
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajar */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12 col-sm-6">
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">

                <?php if(Yii::$app->session->hasFlash('create')):?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert"></button>
                         <?php echo  Yii::$app->session->getFlash('create'); ?>
                    </div>
                <?php endif; ?>

                <div class="caption">
                    <i class="icon-bubbles font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Borang Pendaftaran Pelajar</span>
                </div>

            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="portlet-body">
			 
                <div class="panel-group accordion" id="accordion3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">A. MAKLUMAT PELAJAR </a>
                            </h4>
                        </div>
                        <div id="collapse_3_1" class="panel-collapse in">
                            <div class="panel-body">

                    <?= $form->field($model, 'nama_pelajar')->textInput(['maxlength' => true,'style'=>'text-transform:uppercase']) ?>

                    <?= $form->field($model, 'jantina')->dropDownList([ 'Lelaki' => 'Lelaki', 'Perempuan' => 'Perempuan', ], ['prompt' => '--Sila Pilih--']) ?>

                    <?= $form->field($model, 'tarikh_lahir')->textInput(['maxlength' => true,'class'=>'form-control date-picker']) ?>

                    <?= $form->field($model, 'tempat_lahir')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'no_surat_beranak')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'no_mykid')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'tarikh_masuk')->textInput(['maxlength' => true,'class'=>'form-control date-picker']) ?>

                    <?= $form->field($model, 'tahun_mula')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'alamat_rumah')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'SPRA')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'PSRA')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'warganegara')->dropDownList([ 'Warganegara' => 'Warganegara', 'Bukan Warganegara' => 'Bukan Warganegara', ], ['prompt' => '--Sila Pilih--']) ?>


                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">B. MAKLUMAT IBU BAPA / PENJAGA </a>
                            </h4>
                        </div>
                        <div id="collapse_3_2" class="panel-collapse collapse">
                             <div class="panel-body">

                                <?= $form->field($model, 'nama_bapa')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'no_kad_pengenalan_bapa')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'pekerjaan_bapa_penjaga')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'no_tel_bapa')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'no_hp_bapa')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'alamat_majikan_bapa_penjaga')->textarea(['rows' => 6]) ?>

                                <?= $form->field($model, 'gaji_bapa')->dropDownList(
                                    $pendapatan, 
                                [
                                    'prompt' => '--Sila Pilih--',

                                ]) ?>

                                <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'no_kad_pengenalan_ibu')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'pekerjaan_ibu')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'no_tel_ibu')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'no_hp_ibu')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'alamat_majikan_ibu')->textarea(['rows' => 6]) ?>

                                <?= $form->field($model, 'gaji_ibu')->dropDownList(
                                    $pendapatan, 
                                [
                                    'prompt' => '--Sila Pilih--',

                                ]) ?>

                            </div>
                        </div>
                    </div>
                  
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3">C. TEMPAT PUSAT PENGAJIAN </a>
                            </h4>
                        </div>
                        <div id="collapse_3_3" class="panel-collapse collapse">
                            <div class="panel-body">

                                <?= $form->field($model2, 'nama_pusat_pengajian_pertama')->dropDownList($pengajian, ['prompt' => '--Sila Pilih--']) ?>

                                <?= $form->field($model2, 'nama_pusat_pengajian_kedua')->dropDownList($pengajian, ['prompt' => '--Sila Pilih--']) ?>

                                <?= $form->field($model2, 'nama_pusat_pengajian_ketiga')->dropDownList($pengajian, ['prompt' => '--Sila Pilih--']) ?>

                                <?= $form->field($model2, 'sessi_pengajian')->dropDownList([ 'Sessi Pagi' => 'Sessi Pagi', 'Sessi Petang' => 'Sessi Petang', ], ['prompt' => '--Sila Pilih--']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled"  data-parent="#accordion3" href="#collapse_3_4"> PENGAKUAN IBU BAPA / PENJAGA </a>
                            </h4>
                        </div>
                        <div id="collapse_3_4" class="panel-collapse">
                            <div class="panel-body">

                                <span>Saya Ibu Bapa/penjaga kanak-kanak di atas,bersetuju menyerahkannya mengikuti <b>KELAS TAHFIZ UMMAH BANDAR BARU BANGI</b> yang dikelolakan oleh <b>ABIM</b>. Saya juga mengaku bersedia memberikan sumbangan yuran bulanan seperti yang telah ditetapkan dan saya juga akan mematuhi semua peraturan yang telah ditetapkan selama kanak-kanak tersebut mengikuti <b>KELAS TAHFIZ UMMAH BANDAR BARU BANGI</b>.</span>
                     
       

                            </div>
                        </div>
                    </div>
                </div>
                <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                              
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

