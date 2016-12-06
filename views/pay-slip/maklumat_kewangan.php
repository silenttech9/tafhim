<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MaklumatKakitangan;
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */

$this->title = 'Tambah Maklumat Kewangan';
$this->params['breadcrumbs'][] = ['label' => 'Pengurusan Gaji Kakitangan', 'url' => ['pengurusan_gaji']];
$this->params['breadcrumbs'][] = $this->title;

$staf = ArrayHelper::map(MaklumatKakitangan::find()->orderBy(['nama'=>SORT_ASC])->asArray()->all(),'id_staf','nama');
?>
<div class='row'>
	<div class="col-md-12">
		<h3 class="page-title">Pengurusan Gaji <small>Maklumat Kewangan</small></h3>
		<div class="portlet light bordered">
			<div class="portlet-title">
	            <div class="caption font-green-haze">
	                <i class="icon-user font-green-haze"></i>
	                <span class="caption-subject bold uppercase">Tambah Maklumat Kewangan </span>
	            </div>
	            <div class="actions">
	                                <!---->
	                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	            </div>
	        </div>
	        <div class="portlet-body form">
	        	<?php $form = ActiveForm::begin(
                    [
                        'options' => ['class' => 'form-horizontal']
                    ]); ?>

				    <div class="row">
				        <div class="portlet-body-form">
				            <div class="form-body">
				                <div class="form-group">
                                    <label class="col-md-3 control-label ">Nama Kakitangan</label>
                                    <div class="col-md-6">
                                        <select  class="form-control" name="nama">
                                            <option value="">--Sila Pilih--</option>
                                            <?php 
                                                foreach ($model as $key => $value) {
                                            ?>
                                            <option value="<?= $value['id_staf'] ?>" ><?= $value['nama']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                        
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Peratus Kwsp</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="peratus_kwsp">
                                                <option value="">--Sila Pilih--</option>
                                                <option value="8">8</option>
                                                <option value="11">11</option>
                                            </select>                                            
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gaji Asas</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="gaji_asas" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Elaun Asas</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="elaun_asas" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Elaun Rumah</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="elaun_rumah" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tabung Haji</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="tabung_haji" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tabung Guru</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="tabung_guru" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Sewa Rumah</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="sewa_rumah" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kksk</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="kksk" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Loan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="loan" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gaji Tahan</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="gaji_tahan" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Acc Tabung Haji</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="acc_tabung_haji" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">No Kwsp</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="no_kwsp" value="0">
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Acc Bimb</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="acc_bimb" value="0">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Simpan</button>                     
                                <a class="btn btn-default" href="/tahfiz/web/index.php?r=pay-slip%2Fpengurusan_gaji">   <span class="hidden-xs">Kembali </span>
                                </a>   
                            </div>
                                         
                    </div>
                    <?php ActiveForm::end(); ?>            

	        </div>
		</div>
	</div>
</div>

