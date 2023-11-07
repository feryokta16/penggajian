<!-- Begin Page Content -->
<div class="container-fluid" style="padding-bottom: 100px;">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    <a class="btn btn-sm btn-success mb-2 ml-auto" href="<?php echo base_url('admin/dataKehadiran/tambahData/')?>"><i class="fas fa-plus"></i> Tambah Data</a>
  </div>

<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>NIK</th>
			<th>Nama Pegawai</th>
			<th>jam</th>
			<th>Tanggal</th>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Status</th>
			<th>Keterangan</th>
			<th>Jabatan</th>
			<th>Bukti Kehadiran</th>
			<th> Action</th>
		</tr>
	</thead>
	<tbody>
			<?php $no=1;  foreach ($present as $k) : ?>
		<tr>
			<td><?php echo $k->nik ?></td>
			<td><?php echo $k->nama_pegawai ?></td>
			<td><?php echo $k->jam ?></td>
			<td><?php echo $k->tanggal ?></td>
			<td><?php echo $k->bulan ?></td>
			<td><?php echo $k->tahun ?></td>
			<td><?php echo $k->status ?></td>
			<td><?php echo $k->keterangan ?></td>
			<td><?php echo $k->nama_jabatan ?></td>
			<td><img src="<?php echo base_url().'assets/photo/'.$k->photo?>" width="60px"></td>
			<td>
                            <center>
                            		<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataKehadiran/lihatdata/'.$k->id_presents)?>"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataKehadiran/updateData/'.$k->id_presents)?>"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('apakah anda yakin ingin mengehapus data ini')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataKehadiran/deleteData/'.$k->id_presents)?>"><i class="fas fa-trash"></i></a>
                            </center>
          	</td>
		</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<!-- /.container-fluid -->