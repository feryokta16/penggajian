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
		<h2>Laporan Absensi Bulanan</h2>
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
					<td class="text-center">NO</td>
					<td class="text-center">NIK</td>
					<td class="text-center">Nama Pegawai</td>
					<td class="text-center">Jenis Kelamin</td>
					<td class="text-center">Jabatan</td>
					<td class="text-center">Hadir</td>
					<td class="text-center">Lembur</td>
					<td class="text-center">Alpa</td>	
					<td class="text-center">Izin</td>
					<td class="text-center">Sakit</td>
					</tr>
					<?php $no=1;  foreach ($cetakAbsensi as $a) : ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $a->nik ?></td>
							<td><?php echo $a->nama_pegawai ?></td>
							<td><?php echo $a->jenis_kelamin ?></td>
							<td><?php echo $a->nama_jabatan ?></td>
							<td><?php echo $a->hadir ?></td>
							<td><?php echo $a->lembur ?></td>
							<td><?php echo $a->alpha ?></td>
							<td><?php echo $a->izin ?></td>
							<td><?php echo $a->sakit ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
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