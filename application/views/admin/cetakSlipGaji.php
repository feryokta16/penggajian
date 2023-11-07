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
		<h2>SLIP GAJI</h2>
		</div>
	</center>
						
<?php $no=1; foreach($cetakGaji as $ps) : ?>

	<table >
		<tr>
			<td width="70px"></td>
			<td width="70px">Nama</td>
			<td>:</td>
			<td><?php echo $ps->nama_pegawai ?></td>
		</tr>
		<tr>
			<td width="70px"></td>
			<td width="70px">Nik</td>
			<td>:</td>
			<td><?php echo $ps->nik ?></td>
		</tr>
		<tr>
			<td width="70px"></td>
			<td width="100px">Jabatan</td>
			<td>:</td>
			<td><?php echo $ps->nama_jabatan ?></td>
		</tr>
		<tr>
			<td width="70px"></td>
			<td width="100px">No Rekening</td>
			<td>:</td>
			<td><?php echo $ps->no_rekening ?></td>
		</tr>
		<tr>
			<td width="70px"></td>
			<td width="70px">Bulan</td>
			<td>:</td>
			<td><?php echo substr ($ps->bulan, 0,1 ) ?></td>
		</tr>
		<tr>
			<td width="70px"></td>
			<td width="70px">Tahun</td>
			<td>:</td>
			<td><?php echo substr ($ps->bulan, 1,4 ) ?></td>
		</tr>

	</table>
	<table class="table table-striped table-bordered mt-3">
		<tr>
			<th class="text center" width="5%">No</th>
			<th class="text center">Keterangan</th>
			<th class="text center">Jumlah</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Gaji Pokok</td>
			<td>Rp. <?php echo number_format($ps->gaji_pokok,0,',','.')?></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Uang Transport</td>
			<td>Rp. <?php echo number_format($ps->uang_transport,0,',','.')?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>BPJS</td>
			<td>Rp. <?php echo number_format($ps->Bpjs,0,',','.')?></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Lembur</td>
			<td>Rp. <?php echo number_format($ps->jml_tambahan,0,',','.')?></td>
		</tr>
		<tr>
			<td>5</td>
			<td>Potongan</td>
			<td>Rp. <?php echo number_format($ps->jml_potongan,0,',','.')?></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: right">Total gaji</td>
			<td>Rp. <?php echo number_format($ps->total_gaji,0,',','.')?></td>
		</tr>
	</table>
	<br>
	<br>
	<table width="100%">
		<tr>
			<td>
				<p>Pegawai</p>
				<br>
				<br>
				<br>
				<br>
			<p class="font-weight-bold"><?php echo $ps->nama_pegawai ?></p>
			</td>
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
<?php endforeach; ?>
</body>
</html>
<script type="text/javascript">
	window.print();
</script>