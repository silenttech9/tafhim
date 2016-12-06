<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\LookupPendapatan;
use app\models\LookupPusatPengajian;
use app\models\LookupKelas;
use yii\widgets\DetailView;

$pendapatan = ArrayHelper::map(LookupPendapatan::find()->asArray()->all(), 'id', 'pendapatan');
$pengajian = ArrayHelper::map(LookupPusatPengajian::find()->asArray()->all(), 'id', 'pusat_pengajian');
$kelas = ArrayHelper::map(LookupKelas::find()->where(['id_pusat_pengajian'=>$model->pusat_pengajian_id])->asArray()->all(), 'id', 'kelas');

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarPenjaga */

$this->title = 'Maklumat Pelajar Pending: ' . $model->nama_pelajar;
$this->params['breadcrumbs'][] = ['label' => 'Maklumat Pelajar Pending', 'url' => ['pending']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_pelajar, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Status';
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">

                    <span class="caption-subject bold uppercase"><?= Html::encode($this->title) ?></span>
                </div>
                 <div class="tools actions">

                        <a href="" class="collapse"> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>

                </div>
            </div>
            <div class="portlet-body" >

<div class="maklumat-pelajar-penjaga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pusat_pengajian_id')->dropDownList($pengajian, 
    [
        'prompt' => '--Sila Pilih--',
        'onchange'=>'$.post("'.Yii::$app->urlManager->createUrl(['maklumat-pelajar-penjaga/kelas','id'=>'']).'"+$(this).val(), function(data){$("select#kelas").html(data);})',

    ]) ?>

    <?= $form->field($model, 'kelas')->dropDownList($kelas, ['prompt' => '--Sila Pilih--','id'=>'kelas']) ?>

    <?= $form->field($model, 'sesi_pengajian')->dropDownList([ 'Pagi' => 'Pagi', 'Petang' => 'Petang', ], ['prompt' => '--Sila Pilih--']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Approved' => 'Approved', 'Pending' => 'Pending', ], ['prompt' => '--Sila Pilih--']) ?>

    <?= $form->field($model, 'tahun_lewat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alumni')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<span>Pilihan Pusat Pengajian</span>
<br><br>
    <?= DetailView::widget([
        'model' => $model_pusat,
        'attributes' => [
        [
            'label' => 'Pilihan Pertama',
            'value' => $model_pusat->nama_pusat_pengajian_pertama ? $model_pusat->pertama->pusat_pengajian : null,
        ],
        [
            'label' => 'Pilihan Kedua',
            'value' => $model_pusat->nama_pusat_pengajian_kedua ? $model_pusat->kedua->pusat_pengajian : null,
        ],
        [
            'label' => 'Pilihan Ketiga',
            'value' => $model_pusat->nama_pusat_pengajian_ketiga ? $model_pusat->ketiga->pusat_pengajian : null,
        ],

        'sessi_pengajian',




        ],
    ]) ?>


</div>

            </div>
        </div>
    </div>
</div>