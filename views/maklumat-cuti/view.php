<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatCuti */

$this->title = 'Maklumat Cuti';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Maklumat Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Maklumat Terperinci </h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-briefcase font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Maklumat Cuti </span>
                </div>
                <div class="tools actions">
                    <div class="btn-group">
                        <a class="btn btn-sm blue-chambray dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Tindakan
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <?= Html::a('Tambah Kakitangan', ['create'], ['class' => '#']) ?>
                            </li>
                            <li>
                                <?= Html::a('Kemaskini Kakitangan', ['update','id' => $model->id], ['class' => '#']) ?>
                            </li>
                            <li>
                                <?= Html::a('Padam Kakitangan', ['delete','id' => $model->id], ['class' => '#','data' => [
                            'confirm' => 'Adakah anda pasti untuk hapuskan maklumat ini ?',
                            'method' => 'post',
                        ],]) ?>
                            </li>
                        </ul>
                    </div>
                    <a href="" class="collapse"> </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
                
            </div>
            <div class="maklumat-cuti-view">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'nama_kakitangan.nama',
                        'cuti.jenis_cuti',
                        'tarikh_mula',
                        'tarikh_akhir',
                        'sebab_cuti',
                        'bilangan_cuti',

                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>

