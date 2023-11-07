<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>
	<center>
		<h1>CV Garasi Trift</h1>
		<h5>Gg. Bina Satwa No.9A, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161</h5>
		<hr style="border : 3px solid black;">
		<h2>Laporan Gaji Bulanan</h2>
		</div>
	</center>
<?php
 if((isset($_GET['bulan']) && $_GET['bulan']!='')&&(isset($_GET['tahun'])&& $_GET['tahun']!='')){
						$bulan = $_GET['bulan'];
						$tahun = $_GET['tahun'];
						$bulantahun = $bulan.$tahun;
					}else{
						$bulan = date('m');
						$tahun = date('Y');
						$bulantahun = $bulan.$tahun;
					}
					
?>
	<table >
		<tr>
			<td width="50px"></td>
			<td width="50px">Bulan</td>
			<td>:</td>
			<td><?php echo $bulan ?></td>
		</tr>
		<tr>
			<td width="50px"></td>
			<td width="50px">Tahun</td>
			<td>:</td>
			<td><?php echo $tahun ?></td>
		</tr>
	</table>
	<br>
	<table class="table table-bordered table-striped">
						<tr>
							<th class="text-center">NO</th>
							<th class="text-center">NIK</th>
							<th class="text-center">Nama Pegawai</th>
							<th class="text-center">Jenis Kelamin</th>
							<th class="text-center">Jabatan</th>
							<th class="text-center">Rekening</th>
							<th class="text-center">Gaji Pokok</th>
							<th class="text-center">Uang Transport</th>
							<th class="text-center">BPJS</th>
							<th class="text-center">lembur</th>
							<th class="text-center">Potongan</th>
							<th class="text-center">Total Gaji</th>
						</tr>
						<?php 
						$no=1; foreach($kehadiran as $g){  ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $g->nik ?></td>
							<td><?php echo $g->nama_pegawai ?></td>
							<td><?php echo $g->jenis_kelamin?></td>
							<td><?php echo $g->nama_jabatan?></td>
							<td><?php echo $g->no_rekening?></td>
							<td>Rp.<?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($g->uang_transport,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($g->Bpjs,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($g->jml_tambahan,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($g->jml_potongan,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($g->total_gaji,0,',','.') ?></td>
						</tr>
						<?php
					}
					?>
					</table>
					<br>
					<br>
	<table width="100%">
				<td></td>
				<td width="200px">
					<p>Bogor, <?php echo date("d M Y")?><br>CEO</p>
					<br>
					<br>
					<br>
					<br>
					<p class="font-weight-bold">Lola Arisinta Pitaloka</p>
				</td>
			</tr>
		</table>
	</body>
	</html>
	<script type="text/javascript">
		window.print();
	</script>