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
						<th>NO</th>
						<th>NIK</th>
						<th>Nama Pegawai</th>
						<th>Tanggal</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Status</th>
						<th>Keterangan</th>
						<th>Jabatan</th>
					</tr>
					<?php $no=1;  foreach ($kehadiran as $k) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $k->nik ?></td>
			<td><?php echo $k->nama_pegawai ?></td>
			<td><?php echo $k->tanggal ?></td>
			<td><?php echo $k->bulan ?></td>
			<td><?php echo $k->tahun ?></td>
			<td><?php echo $k->status ?></td>
			<td><?php echo $k->keterangan ?></td>
			<td><?php echo $k->nama_jabatan ?></td>
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