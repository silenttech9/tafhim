<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */

$this->title = 'Maklumat Kakitangan';
$this->params['breadcrumbs'][] = ['label' => 'Pengurusan Kakitangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Maklumat Terperinci </h3>
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
                        <li class="active">
                            <a href="#">
                                <i class="icon-home"></i> Overview </a>
                        </li>
                        <li>
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
                                    <a href="#tab_1_4" data-toggle="tab">Maklumat Kewangan</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [

                                            'statuskerja.status_pekerjaan',
                                            'nama',
                                            'no_kp',
                                            'tarikh_mula_kerja',
                                            'jawatan_sekarang',
                                            'no_pekerja',
                                            'nama_tahfiz.pusat_pengajian',
                                            'alamat_tempat_kerja:ntext',
                                            'warganegara',
                                            'tarikh_lahir',
                                            'tempat_lahir:ntext',
                                            [
                                                'label' => 'Alamat Surat Menyurat',
                                               // 'format' => ['raw'],
                                                'value' => strip_tags($model->alamat_surat_menyurat),
                                            ],
                                            'no_tel_rumah',
                                            'no_tel_bimbit',
                                            'tahap_kesihatan',
                                            'pengesahan_kesihatan',
                                            'kecacatan',
                                            'nyatakan_kecacatan',
                                            'tinggi_cm',
                                            'berat_kg',
                                            'kumpulan_usrah',
                                            'nama_ketua_usrah',
                                            'unit_usrah',
                                            'no_ahli_abim',
                                            'rujukan_tawaran',
                                            'nama_waris',
                                            'hubungan_waris',
                                            'no_tel_waris',
                                            'kelulusan_tertinggi',
                                        ],
                                    ]) ?>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <!-- END CHANGE AVATAR TAB -->
                                
                                <!-- PRIVACY SETTINGS TAB -->
                                <div class="tab-pane" id="tab_1_4">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [

                                            
                                            'gaji_asas',
                                            'elaun_asas',
                                            'elaun_rumah',
                                            'tabung_gaji',
                                            'tabung_guru',
                                            'sewa_rumah',
                                            'kksk',
                                            'loan',
                                            'gaji_tahan',
                                            'acc_tabung_haji',
                                            'no_kwsp',
                                            'acc_bimb',
                                            'peringkat_gaji',
                                            'tangga_gaji',
                                            'skim_gaji',
                                            'skim_gaji_awal',
                                            'peratus_kwsp',
                                        ],
                                    ]) ?>
                                </div>
                                <!-- END PRIVACY SETTINGS TAB -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

