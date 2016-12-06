<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Paperwork */
?>

<div class="row">

	<h3 class="title">Maklumat Kakitangan Resign</h3>
	<br>
	<table class="table table-responsive table-bordered"> 
		<tr>
			<th>#</th>
			<th>Nama Kakitangan</th>
			<th>Nombor Kad Pengenalan</th>
			<th>Jawatan Sekarang</th>
			<th>Tarikh Resign</th>
			<th>Tahfiz</th>
			<th>Nombor Pekerja</th>
		</tr>
		<?php 
			
			foreach ($model as $key => $value) {
		?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td><?= $value['nama'] ?></td>
					<td><?= $value['no_kp'] ?></td>
					<td><?= $value['jawatan_sekarang'] ?></td>
					<td><?= $value['tarikh_resign']?></td>
					<td><?= $value['nama_tahfiz']['pusat_pengajian'] ?></td>
					<td><?= $value['no_pekerja'] ?></td>
				</tr>
		<?php }?>
	</table>
</div>