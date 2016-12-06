<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\PaySlip;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Pengurusan Gaji';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Slip Gaji <small>Kakitangan Aktif</small></h3>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-calendar"></i>Slip Gaji Bulan  <?php echo date("F Y",strtotime($tarikh)); ?>
                </div>
            </div>

            <center>
            <?php $form = ActiveForm::begin([
                'action' => ['proses_gaji'],
                'method' => 'GET',
                'options' => [
                'class' => 'form-horizontal'
             ]
            ]); ?>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tahun</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="tahun">
                                    <?php
                                        $year = date("Y",time());
                                            for($y=$year;$y>=2012;$y--)
                                            { 
                                                 // $options[$y] = $y;
                                    ?>
                                        <option value="<?= $y ?>" <?php if ($tahunsemasa == $y){ echo 'selected';} ?> ><?= $y ?></option>
                                    <?php 
                                            }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Bulan</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="bulan">
                                    <?php
                                        $month = date("n",time());
                                        
                                            for($m=1;$m<=12;$m++)
                                            { 
                                                 // $options[$m] = $m;
                                    ?>
                                        <option value="<?= $m ?>" <?php if ($bulansemasa == $m){ echo 'selected';} ?> ><?= $m ?></option>
                                    <?php 
                                            }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-primary" value="Lihat Laporan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
            </center>
            
        </div>
    </div>
</div>

<!-- result -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-users"></i>Senarai kakitangan
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn dark btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">Tapisan
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" class="showall">Papar Semua</a>
                            </li>
                            <li>
                                <a href="javascript:;" class="generated">Telah Di Jana</a>
                            </li>
                            <li>
                                <a href="javascript:;" class="notgenerated">Belum Di Jana</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Nama Kakitangan</th>
                        <th>No Kad Pengenalan</th>
                        <th>No Pekerja</th>
                        <th>Slip Gaji</th>
                    </tr>
                    <tr>
                        <td>
                            <?php $form = ActiveForm::begin([
                                'action' => ['proses_gaji_carian'],
                                'method' => 'get',
                                'id'=>'proses_gaji',
                            ]); ?>
                                <input type="text" id="proses_gaji_cariannama" name="nama" class="form-control" value="">
                                <input type="hidden" name="bulan" class="form-control" value="<?= $bulansemasa ?>">
                                <input type="hidden" name="tahun" class="form-control" value="<?= $tahunsemasa ?>">
                            <?php ActiveForm::end(); ?>
                        </td>
                            
                        <td>
                            <?php $form = ActiveForm::begin([
                                'action' => ['proses_gaji_carian'],
                                'method' => 'get',
                                'id'=>'proses_gajinokp',
                            ]); ?>
                                <input type="text" id="proses_gaji_cariannokp" name="no_kp" class="form-control" value="">
                                <input type="hidden" name="bulan" class="form-control" value="<?= $bulansemasa ?>">
                                <input type="hidden" name="tahun" class="form-control" value="<?= $tahunsemasa ?>">
                            <?php ActiveForm::end(); ?>
                        </td>
                        <td>
                            <?php $form = ActiveForm::begin([
                                'action' => ['proses_gaji_carian'],
                                'method' => 'get',
                                'id'=>'proses_gaji',
                            ]); ?>
                                <input type="text" id="proses_gaji_cariannopekerja" name="no_pekerja" class="form-control" value="">
                                <input type="hidden" name="bulan" class="form-control" value="<?= $bulansemasa ?>">
                                <input type="hidden" name="tahun" class="form-control" value="<?= $tahunsemasa ?>">
                            <?php ActiveForm::end(); ?>
                        </td>
                    </tr>
                    <?php
                        if (empty($model)) {
                    ?>
                        <tr>
                            <td colspan='3'><i>Tiada Rekod Di Jumpai</i></td>
                        </tr>
                    <?php 
                        }
                    ?>
                    <?php
                        foreach ($model as $key => $value) {
                            if(date("Y-m",strtotime($value['tarikh_mula_kerja'])) > date("Y-m",strtotime($tarikh))){
                    ?>
                        
                    <?php }
                            else{
                                $slip = PaySlip::find()
                                        ->where(['staff_id'=> $value['id_staf']])
                                        ->andWhere(['tarikhmasa'=>$tarikh])
                                        ->one();
                                if (empty($slip)) {
                    ?>
                    <tr class="blmjana">
                        <td><?= $value['nama']?></td>
                        <td><?= $value['no_kp']?></td>
                        <td><?= $value['no_pekerja']?></td>
                        <td>
                            <?= Html::a('Jana', ['generate_gajiform','id'=>$value['id_staf'],'tahun'=>$tahunsemasa,'bulan'=>$bulansemasa,'referer'=>'staf_aktif'], ['class' => 'btn blue btn-sm','title'=>'Jana']) ?>
                        </td>
                    </tr>
                    <?php
                                }
                                else{
                    ?>

                    <tr class="tlhjana">
                        <td><?= $value['nama']?></td>
                        <td><?= $value['no_kp']?></td>
                        <td><?= $value['no_pekerja']?></td>
                        <td>
                            <?= Html::a('<i class="fa fa-print"></i> Cetak', ['cetak_payslip','id'=>$slip->pay_slip_id], ['class' => 'btn btn-sm green-meadow','title'=>'Cetak','target'=>'_BLANK']) ?>
                                <?= Html::a('<i class="fa fa-trash"></i> Padam', ['delete_payslip','id'=>$slip->pay_slip_id,'tahun'=>$tahunsemasa,'bulan' => $bulansemasa,'page'=>'staf_aktif'], ['class' => 'btn btn-sm red','title'=>'Padam','data-confirm'=>"Adakah Anda Pasti Mahu Hapuskan Item Ini ?",'data-method' => 'post']) ?>
                        </td>
                    </tr>
                    <?php    
                                }
                            }
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
<!--  -->