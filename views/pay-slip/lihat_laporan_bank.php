<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Lihat Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kewangan', 'url' => ['laporan_bank']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Laporan Kewangan<small> Lihat Laporan</small></h3>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-calendar"></i>Laporan Bank <?php echo date("F Y",strtotime($tarikhmasa)); ?>
                </div>
                <div class="actions">
                    <?= Html::a('Cetak <i class="fa fa-print"></i>', ['lihat_laporan_bank','tahun'=>$tahun,'bulan'=>$bulan,'cetak'=>'cetak'], ['class' => 'btn dark btn-outline btn-sm','target'=>'_BLANK']) ?>
                </div>
            </div>
            <center>
            <?php $form = ActiveForm::begin([
            	'action' => ['lihat_laporan_bank'],
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
	                                    <option value="<?= $y ?>" <?php if ($tahun == $y){ echo 'selected';} ?> ><?= $y ?></option>
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
	                                    <option value="<?= $m ?>" <?php if ($bulan == $m){ echo 'selected';} ?> ><?= $m ?></option>
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
    		<div class="portlet-body">
    			<table data-toggle="table" data-height='600'>
    				<thead>
                        <tr>
                            <th>Bil</th>
                            <th>Nama Kakitangan</th>
                            <th>No. Kad Pengenalan</th>
                            <th>No. Akaun Bank</th>
                            <th>Gaji Bersih</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <?php 
                        $total_gaji_bersih = 0;

                        for($i=0;$i<$bil;$i++)
                        {
                            $total_gaji_bersih = $total_gaji_bersih + round($gaji_bersih[$i],2);
                        }
                        
                    ?>
                        <tr>
                            <td align="right" colspan="4" style="font-weight:bold;">JUMLAH KESELURUHAN</td>
                            
                            <td style="font-weight:bold;"><?= number_format($total_gaji_bersih,2) ?></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                            $total_gaji_bersih = 0;

                                for($i=0;$i<$bil;$i++)
                                {
                            ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= $nama[$i] ?></td>
                                <td><?= $no_kp[$i] ?></td>
                                <td><?= $acc_bimb[$i] ?></td>
                                <td><?= number_format($gaji_bersih[$i],2) ?></td>
                            </tr>

                            <?php } ?>
                    </tbody>
    				
    			</table>
    		</div>
    	</div>
    </div>
</div>