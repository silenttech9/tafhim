<?php

use yii\helpers\Html;

$this->title = 'Pusat Pengajian';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="page-title"><?= Html::encode($this->title) ?><small> Yuran Pendaftaran</small></h3>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered ">
			<div class="portlet-body">
				<div class='row'>
					<?php
						foreach ($model as $key => $value) {
					?>
					
					<div class="col-md-4" style="margin-bottom:20px;">
						<a class="dashboard-stat dashboard-stat-v2 blue open-modal" href="#myModal" data-toggle="modal" data-id="<?= $value['id'] ?>" data-name='Yuran Pendaftaran <?= $value['pusat_pengajian'] ?>'>
				            <div class="visual">
				                <i class="fa fa-user"></i>
				            </div>
				            <div class="details">
				                <div class="number">
				                    <span data-counter="counterup" data-value="<?= $value['total']?>"><?= $value['total']?></span>
				                </div>
				                <div class="desc"> <?= $value['pusat_pengajian'] ?> </div>
				            </div>
				        </a>
					</div>
					<?php } ?>
				</div>
				
			</div>
		</div>
		
	</div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title" id="tahfizname"></h4>
	      	</div>
	      	<form action="/tafhim_latest/web/index.php" method="get" class ='form-horizontal'>
	      		<input type="hidden" name="r" value="yuran-daftar/yurandaftar">
	      		<div class="modal-body">
	      			<div class="form-group">
                        <label class="col-md-3 control-label">Tahun</label>
                        <div class="col-md-6">
                        	<h4><strong><?= date("Y",time());?></strong></h4>
                        	<input type="hidden" name="tahun" value="<?= date("Y",time());?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Darjah/Tahap</label>
                        <div class="col-md-6">
                            <select class="form-control" name="umur">
                            	<?php
                            		$a = 0;
						            for($y=7;$y<=12;$y++)
						            {
							    ?>
	                                <option value="<?= $y ?>" ><?= ++$a ?></option>
	                            <?php 
	                            	}
	                            ?>
                            </select>
                        </div>
                    </div>
		        	<input type="hidden" name="id_pengajian" id="tahfizId" value=""/>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="submit" class="btn btn-success">Seterusnya</button>
		      	</div>
	      	</form>
	      	
	    </div>

	</div>
</div>