<h2 class="head"><b>Laporan Gaji Bersih <?php echo date("F Y",strtotime($tarikhmasa)); ?></b></h2>
<table class="table main">
    <thead>
        <tr>
            <th>Bil</th>
            <th>Nama Kakitangan</th>
            <th>Gaji Kasar</th>
            <th>Sewa Rumah</th>
            <th>EPF</th>
            <th>Socso</th>
            <th>Tabung Guru</th>
            <th>Tabung Haji</th>
            <th>KKSK</th>
            <th>Bonus <?php echo $tahun; ?></th>
            <th>Loan</th>
            <th>CTG</th>
            <th>Lain-Lain</th>
            <th>Gaji Bersih</th>
        </tr>
    </thead>
<?php 
    $total_gaji_kasar = 0;
    $total_gaji_bersih = 0;
    $total_sewa_rumah = 0;
    $total_oleh_pekerja = 0;
    $total_socso = 0;
    $total_tabung_guru = 0;
    $total_tabung_haji = 0;
    $total_kksk = 0;
    $total_gaji_tahan = 0;
    $total_bonus = 0;
    $total_loan = 0;
    $total_ctg = 0;
    $total_lain_jumlah = 0;
    $total_lainlain = 0;
    $total_days = date("t",strtotime($tarikhmasa));

    for($i=0;$i<$bil;$i++)
    {
        $total_gaji_kasar = $total_gaji_kasar + round($total_gaji[$i],2);
        $total_sewa_rumah = $total_sewa_rumah + (round($sewa_rumah[$i],2));
        $total_gaji_bersih = $total_gaji_bersih + round($gaji_bersih[$i],2);
        $total_oleh_pekerja = $total_oleh_pekerja + round($epf[$i],2);
        $total_socso = $total_socso + $socso[$i];
        $total_tabung_guru = $total_tabung_guru + round($tabung_guru[$i],2);
        $total_tabung_haji = $total_tabung_haji + round($tabung_haji[$i],2);
        $total_kksk = $total_kksk + round($kksk[$i],2);
        $total_bonus = $total_bonus + round($bonus[$i],2);
        $total_gaji_tahan = $total_gaji_tahan + round($gaji_tahan[$i],2);
        $total_loan = $total_loan + round($loan[$i],2);
        $total_ctg = $total_ctg + (((round($total_gaji[$i],2) + round($gaji_tahan[$i],2)) / $total_days) * round($ctg[$i],2));
        $total_lain_jumlah = $total_lain_jumlah + round($lain_jumlah[$i],2);

    }
?>
<tfoot>
    <tr>
        <td colspan="2" style="font-weight:bold;">JUMLAH KESELURUHAN</td>
        <td style="font-weight:bold;"><?= number_format($total_gaji_kasar,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0 - $total_sewa_rumah,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0 - $total_oleh_pekerja,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0 - $total_socso,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0 - $total_tabung_guru,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0 - $total_tabung_haji,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0 - $total_kksk,2) ?></td>
        <td style="font-weight:bold;"><?= number_format($total_bonus,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0 - $total_loan,2) ?></td>
        <td style="font-weight:bold;"><?= number_format(0-$total_ctg,2) ?></td>
        <td style="font-weight:bold;"><?= number_format($total_lain_jumlah,2) ?></td>
        <td style="font-weight:bold;"><?= number_format($total_gaji_bersih,2) ?></td>
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
        <td><?= number_format($total_gaji[$i],2) ?></td>
        <td><?= number_format(0-$sewa_rumah[$i],2)?></td>
        <td><?= number_format(0 - $epf[$i],2) ?></td>
        <td><?= number_format(0 - $socso[$i],2) ?></td>
        <td><?= number_format(0 - $tabung_guru[$i],2) ?></td>
        <td><?= number_format(0 - $tabung_haji[$i],2) ?></td>
        <td><?= number_format(0 - $kksk[$i],2) ?></td>
        <td><?= number_format($bonus[$i],2) ?></td>
        <td><?= number_format(0 - $loan[$i],2) ?></td>
        <td><?= number_format(0-((($total_gaji[$i]) / $total_days) * $ctg[$i]),2) ?></td>
        <td><?= number_format($lain_jumlah[$i],2) ?></td>
        <td><?= number_format($gaji_bersih[$i],2) ?></td>
    </tr>

    <?php }?>
    
    </tbody>
</table>