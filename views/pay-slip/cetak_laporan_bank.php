<h2 class="head"><b>Laporan Bank <?php echo date("F Y",strtotime($tarikhmasa)); ?></b></h2>
<table class="table main">
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