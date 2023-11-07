<!-- Begin Page Content -->
<div class="container-fluid" style="padding-bottom: 100px;">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>
   <div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sakit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sakit ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                hadir</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hadir ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Alpha</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $Alpha ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                izin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $izin ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
	<br>
<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
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
			<th>Photo</th>
		</tr>
	</thead>
	<tbody>
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
			<td><img src="<?php echo base_url().'assets/photo/'.$k->photo?>" width="60px"></td>

		</tr>
			<?php endforeach; ?>
		</tbody>
</table>
</div>
<!-- /.container-fluid -->