<h2 class="head"><b>Laporan KWSP <?php echo date("F Y",strtotime($tarikhmasa)); ?></b></h2>

<table class="table main">
    <thead>
        <tr>
            <th>Bil</th>
            <th>Nama Kakitangan</th>
            <th>No. Kad Pengenalan</th>
            <th>No. KWSP</th>
            <th>Gaji (RM)</th>
            <th>Oleh Pekerja (RM)</th>
            <th>Oleh Majikan (RM)</th>
            <th>Jumlah (RM)</th>
            
        </tr>
    </thead>
    <tfoot>
    <?php 
        $totalgaji = 0;
        $totalepf = 0;
        $totalcontribution = 0;
        $totaljumlah = 0;

        for($i=0;$i<$bil;$i++)
        {
            $totalgaji = $totalgaji + round($gaji[$i],2);
            $totalepf = $totalepf + (round($epf[$i],2));
            $totalcontribution = $totalcontribution + round($contribution[$i],2);
            $totaljumlah = $totaljumlah + round($jumlah[$i],2);
        }
    ?>
        <tr>
            <td align='right' colspan="4" style="font-weight:bold;">JUMLAH KESELURUHAN</td>
            <td  style="font-weight:bold;"><?= number_format($totalgaji,2) ?></td>
            <td style="font-weight:bold;"><?= number_format($totalepf,2) ?></td>
            <td style="font-weight:bold;"><?= number_format($totalcontribution,2) ?></td>
            <td style="font-weight:bold;"><?= number_format($totaljumlah,2) ?></td>
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
            <td><?= $no_kwsp[$i] ?></td>
            <td><?= number_format($gaji[$i],2) ?></td>
            <td><?= number_format($epf[$i],2) ?></td>
            <td><?= number_format($contribution[$i],2) ?></td>
            <td><?= number_format($jumlah[$i],2) ?></td>
        </tr>
    
    <?php } ?>
    </tbody>
</table>