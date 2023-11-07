<style type="text/css">
	img{
			border-radius: 50%;
		}
		th, td{
			font-size: 15px;
		}
</style>
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<div class="card" style="margin-bottom: 120px">
		<div class="card-header font-weight-bold bg-success text-white">
			Data Pegawai
		</div>
			<?php foreach ($pegawai as $p) : ?>
		<center>
		<img style="width: 250px; height: 250px; margin-top: 30px;"   src="<?php echo base_url('assets/photo/'.$p->photo) ?>">
		<br>
		<br>
		<div style="font-size: 50px">
			<?php echo $p->nama_pegawai ?>
		</div>
		</center>
		<div class="card-body" align="center">
			<div class="row">
			<div calss col-md-7>
			</div>
			<div class="col-md-12" style="margin-left: 200px; margin-top:50px; padding-bottom: 50px;">
				<table  cellspacing="0"  cellpadding="5">
					<tr>
						<th width="510">Data Diri</th>
						<th width="510">Keterangan</td>
					</tr>
					<tr>
						<td width="510">Jabatan</th>
						<td width="510"><?php echo $p->jabatan ?></td>
					</tr>
					<tr>
						<td width="510">Tanggal Masuk</th>
						<td width="510"><?php echo $p->tanggal_masuk ?></td>
					</tr>
					<tr>
						<td width="510">Nik</th>
						<td width="510"><?php echo $p->nik ?></td>
					</tr>
					<tr>
						<td width="510">Jenis Kelamin</th>
						<td width="510"><?php echo $p->jenis_kelamin?></td>
					</tr>
					<tr>
						<td width="510">Status</th>
						<td width="510"><?php echo $p->status ?></td>
					</tr>
				</table>
			</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>