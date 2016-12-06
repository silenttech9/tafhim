
<div class="main">
	<div>
		<span class="tafhim">TAFHIM SDN BHD</span><br>
		GAJI BULANAN - <?php echo strtoupper(date("F Y",strtotime($tarikhmasa))); ?>
		
		<span class="tarikh">BULANAN / BANK <?php echo date("t/m/Y",strtotime($tarikhmasa)); ?><span>
	</div>
	<br>
	<div>
		<table width="100%" class="main">
		<tr>
			 <td width="15%">NO. PEKERJA</td>
			 <td>:</td>
			 <td width="30%"><?php echo $no_pekerja ?></td>
			 <td width="auto;">&nbsp;</td>
			 <td>NAMA</td><td>:</td>
			 <td><?php echo strtoupper($nama) ?></td>
		</tr>
		<tr>
			 <td width="15%">TAHFIZ</td>
			 <td>:</td>
			 <td><?php echo $tahfiz ?></td>
			 <td width="auto;">&nbsp;</td>
			 <td>NO. KP</td><td>:</td><td><?php echo $no_kp ?></td>
		</tr>
		</table>
	</div>
	<div style="clear:both; padding-bottom:5px;">&nbsp;</div>
	<div align="left" style=" padding:0px;">
		<table cellspacing="0" width="95%" class="main">
			<tr>
				 <td width="15%">GAJI ASAS</td>
				 <td>:</td>
				 <td width="30%" align="right"><?php echo number_format($total_gaji,2) ?></td>
				 <td width="30px;">&nbsp;</td>
				 <td colspan="2" style="border-bottom:0px solid #000;">&nbsp;</td>
			</tr>
			<tr>
			 	<td colspan="6">&nbsp;</td>
			</tr>
			<tr>
				 <td colspan="3" style="border-bottom:1px solid #000;">PELARASAN PENAMBAHAN</td>
				 <td width="30px;">&nbsp;</td>
				 <td colspan="2" style="border-bottom:1px solid #000;">PELARASAN PEMOTONGAN</td>
			</tr>
			<?php
			$total_days = date("t",strtotime($tarikhmasa));
			?>
			<tr>
				 <td width="15%">HIBAH</td><td>&nbsp;</td><td align="right"><?php echo number_format($hibah,2) ?></td>
				 <td width="30px;">&nbsp;</td>
				 <td>TABUNG GURU</td><td align="right"><?php echo number_format($tabung_guru,2) ?></td>
			</tr>
			<tr>
				 <td width="15%">BONUS</td>
				 <td>&nbsp;</td>
				 <td width="30%" align="right"><?php echo number_format($bonus,2) ?></td>
				 <td width="30px;">&nbsp;</td>
				 <td>TABUNG HAJI</td><td align="right"><?php echo number_format($tabung_haji,2) ?></td>
			</tr>
			<tr>
				 <td width="15%">LAIN-LAIN</td>
				 <td>&nbsp;</td>
				 <td width="30%" align="right"><?php echo number_format($lain_tambahan,2) ?></td>
				 <td width="30px;">&nbsp;</td>
				 <td>SEWA RUMAH</td><td align="right"><?php echo number_format($sewa_rumah,2) ?></td>
			</tr>
			<tr>
				 <td width="15%">&nbsp;</td>
				 <td>&nbsp;</td>
				 <td width="30%" align="right">&nbsp;</td>
				 <td width="30px;">&nbsp;</td>
				 <td>KKSK CONTR</td><td align="right"><?php echo number_format($kksk,2) ?></td>
			</tr>
			<tr>
				 <td width="15%">&nbsp;</td>
				 <td>&nbsp;</td>
				 <td width="30%" align="right">&nbsp;</td>
				 <td width="30px;">&nbsp;</td>
				 <td>GAJI TAHAN</td><td align="right"><?php echo number_format($gaji_tahan,2) ?></td>
			</tr>
			<tr>
				 <td width="15%">&nbsp;</td>
				 <td>&nbsp;</td>
				 <td width="30%" align="right">&nbsp;</td>
				 <td width="30px;">&nbsp;</td>
				 <td>LOAN</td><td align="right"><?php echo number_format($loan,2) ?></td>
			</tr>
			<tr>
				 <td width="15%">&nbsp;</td>
				 <td>&nbsp;</td>
				 <td width="30%" align="right">&nbsp;</td>
				 <td width="30px;">&nbsp;</td>
				 <td>LAIN-LAIN</td><td align="right"><?php echo number_format($lain,2) ?></td>
			</tr>
			<tr>
				 <td width="15%" >&nbsp;</td>
				 <td >&nbsp;</td>
				 <td width="30%" align="right">&nbsp;</td>
				 <td width="30px;" >&nbsp;</td>
				 <td >CUTI TANPA GAJI</td>
				 <td align="right" ><?php echo number_format(($cuti_tanpa_gaji = (($total_gaji - $gaji_tahan)/$total_days)*$ctg),2) ?>
				 	
				 </td>
			</tr>
			<tr>
			 	<td colspan="6" style="border-bottom:1px solid #000;padding-top:5px;"></td>
			</tr>
			<tr>
			 	<td colspan="6" style="border-bottom:0px solid #000;padding-bottom:5px;"></td>
			</tr>
			<tr>
				 <td width="15%" style="border-bottom:0px solid #000; padding-top:0px">JUMLAH HARI</td>
				 <td style="border-bottom:0px solid #000; padding-bottom:0px">&nbsp;</td>
				 <td style="border-bottom:0px solid #000;" width="30%" align="right"> <?php echo number_format(date("t",strtotime($tarikhmasa)),2); ?> HARI</td>
				 <td width="30px;">&nbsp;</td>
				 <td>CARUMAN KWSP MAJIKAN</td><td align="right"><?php echo number_format($carumanmajikan,2) ?></td>
			</tr>
			<tr>
				 <td colspan="2" style="border-bottom:0px solid #000; padding-bottom:0px">CTG</td>
				 <td style="border-bottom:0px solid #000;" width="30%" align="right"><?php echo $memo_ctg ?> <?php echo number_format($ctg,2); ?> HARI</td>
				 <td>&nbsp;</td>
				 <td>CUTI EHSAN DIAMBIL</td><td align="right"><?php echo number_format($cuti_ehsan,2) ?> HARI</td>
			</tr>
			<tr>
				 <td width="15%" style="border-bottom:0px solid #000; padding-bottom:0px">HARI BEKERJA</td>
				 <td style="border-bottom:0px solid #000; padding-bottom:0px">&nbsp;</td>
				 <td style="border-bottom:0px solid #000;" width="30%" align="right"> <?php echo number_format($total_days - ($ctg + $cuti_ehsan + $cuti_sakit),2) ?> HARI</td>
				 <td>&nbsp;</td>
				 <td>CUTI SAKIT DIAMBIL</td><td align="right"><?php echo number_format($cuti_sakit,2) ?> HARI</td>
			</tr>
			<tr>
			 	<td colspan="6" style="border-bottom:1px solid #000;padding-top:5px;"></td>
			</tr>
		</table>
	</div>
	<br />
	<table width="90%" cellpadding="5" cellspacing="0" class="main">
		<tr>
			 <th style="border-bottom:1px solid #999999">GAJI TETAP</th>
			 <th style="border-bottom:1px solid #999999">PELARASAN</th>
			 <th style="border-bottom:1px solid #999999">GAJI BULAN INI</th>
			 <th style="border-bottom:1px solid #999999">KWSP</th>
			 <th style="border-bottom:1px solid #999999">SOCSO</th>
			 <th style="border-bottom:1px solid #999999">JUMLAH BERSIH</th>
		</tr>
		<tr>
			 <td align="center"><?php echo number_format($total_gaji,2) ?></td>
			 <td align="center"><?php echo number_format(($pelarasan - $cuti_tanpa_gaji),2) ?></td>
			 <td align="center"><?php echo number_format($gaji_bersih - $cuti_tanpa_gaji,2) ?></td>
			 <td align="center"><?php echo number_format($epf,2) ?></td>
			 <td align="center"><?php echo number_format($socso,2) ?></td>
			 <td align="center"><?php echo number_format($gaji_bersih-($epf + $socso + $cuti_tanpa_gaji),2) ?></td>
		</tr>
	</table>
	<br />
</div>
