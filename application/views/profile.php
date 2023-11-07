<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>
	<div class="alert alert-success font-weight-bold mb-4" style="width: 100%">
		Selamat datang <?php echo $this->session->userdata('nama_pegawai') ?>, anda login sebagai pegawai
	</div>

	<div class="card" style="margin-bottom: 120px">
		<div class="card-header font-weight-bold bg-primary text-white">
			Data Pegawai
		</div>
		<?php foreach ($pegawai as $p) : ?>
		<div class="card-body" align="center">
			<div class="row">
			<div calss col-md-7>
				<img style="width: 250px" src="<?php echo base_url('assets/photo/'.$p->photo) ?>">
			</div>
			<div class="col-md-7">
				<table class="table" align="center" style="margin-top: : 100px">
					<tr>
						<td>Nama Pegawai</td>
						<td>:</td>
						<td><?php echo $p->nama_pegawai ?></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td>:</td>
						<td><?php echo $p->jabatan ?></td>
					</tr>
					<tr>
						<td>Nama Pegawai</td>
						<td>:</td>
						<td><?php echo $p->tanggal_masuk ?></td>
					</tr>
					<tr>
						<td>nik</td>
						<td>:</td>
						<td><?php echo $p->nik ?></td>
					</tr>

					<tr>
						<td>jenis kelamin</td>
						<td>:</td>
						<td><?php echo $p->jenis_kelamin?></td>
					</tr>

					<tr>
						<td>Status</td>
						<td>:</td>
						<td><?php echo $p->status ?></td>
					</tr>

				</table>
			</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>