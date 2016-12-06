<!-- result -->
<h2 class="head"><b>Laporan Tabung Kebajikan <?php echo date("F Y",strtotime($tarikhmasa)); ?></b></h2>
<table class="table main">
    <thead>
        <tr>
            <th>Bil</th>
            <th>Nama Kakitangan</th>
            <th>No. Kad Pengenalan</th>
            <th>Jumlah (RM)</th>
        </tr>
    </thead>
	<tfoot>
    <?php
        $total = 0;
        for($i=0;$i<$bil;$i++)
        {
            $total = $total + round($loan[$i],2);
        }
    ?>
         <tr>
            <td align='right' colspan="3" style="font-weight:bold;">JUMLAH KESELURUHAN</td>
            <td  style="font-weight:bold;"><?= number_format($total,2) ?></td>
        </tr>        
    </tfoot>	
    <tbody>
        <?php 
            for($i=0;$i<$bil;$i++)
            {
        ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $nama[$i] ?></td>
            <td><?= $no_kp[$i] ?></td>
            <td><?= number_format($loan[$i],2) ?></td>
        </tr>

        <?php } ?>
    </tbody>
        
</table>