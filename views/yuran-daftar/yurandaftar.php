<?php
use yii\helpers\Html;
use app\models\YuranDaftar;
use app\components\CustomPagination;

$this->title = 'Yuran Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= $this->title ?></h3>
<!-- END PAGE TITLE-->
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered ">
			<div class="portlet-title">
				<div class="caption font-green-haze">
	                 <i class="icon-credit-card font-green-haze"></i>
	                 <span class="caption-subject font-green-haze bold uppercase"> Yuran Pendaftaran 
                    </span>
	            </div>
			</div>
			<div class="portlet-body">
				<table class="table  table-striped table-hover">
					<tr>
						<th>Nama Pelajar</th>
						<th>No Mykid</th>
						<th>Tahap/Tahun</th>
						<th>Tindakan</th>
					</tr>
					<?php
						foreach ($models as $key => $model) {
							$yuran = YuranDaftar::find()
    								->where(['id_pelajar'=> $model['id']])
    								->one();
    						if(empty($yuran)){
					?>
					<tr>
						<td><?= $model['nama_pelajar'] ?></td>
						<td><?= $model['no_mykid']?></td>
						<td><?= $model['umur']?></td>

						<td>
							<?= Html::a('Pembayaran', ['create','id'=>$model['id'],'umur'=>$model['umur']], ['class' => 'btn grey-mint btn-outline sbold uppercase']) ?>
							</td>
					</tr>
						<?php 
							}
							else{
						?>
					<tr style="display:none;">
    					<td></td>
    				</tr>
    					<?php } } ?>
				</table>
				<?php echo \yii\widgets\LinkPager::widget([
				    	'pagination' => $pages,
					]);
				?>
			</div>
		</div>
	</div>
</div>