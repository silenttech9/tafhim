<h2 class="head"><b>Laporan Cuti <?php echo date("F Y",strtotime($tarikhbulan)); ?></b></h2>
<table class="table main">
<thead>
	<tr>
		<th>#</th>
        <th>Nama Kakitangan</th>
        <th>Nombor Pekerja</th>
        <th>Jenis Cuti</th>
        <th>Bilangan Cuti (Hari)</th>
    </tr>
</thead>
	<tbody>
		<?php
	        if (empty($model)) {
	    ?>
	        <tr>
	            <td colspan='3'><i>Tiada Rekod Di Jumpai</i></td>
	        </tr>
	    <?php 
	        }
	        else{
	        	foreach ($model as $key=>$value) {
	    ?>
	    	<tr>
	    		<td><?= $key+1 ?></td>
	    		<td><?= $value['nama'] ?></td>
	    		<td><?= $value['no_pekerja']?></td>
	    		<td><?= $value['jenis_cuti']?></td>
	    		<td><?= $value['bilangan_cuti'] ?></td>
	    		<td></td>
	    	</tr>
	    <?php 
	    		}
	    	}
	    ?>
	</tbody>
</table>
            