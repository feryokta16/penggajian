<!-- Begin Page Content -->
<div class="container-fluid" style="padding-bottom: 100px;"> 

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

<table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>NIK</th>
            <th>Nama Pegawai</th>
            <th>Jam</th>
            <th>Tanggal</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Deskripsi</th>
            <th>Nama Jabatan</th>
            <th>Bukti Kehadiran</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php $no=1;  foreach ($presensi_pulang as $k) : ?>
        <tr>
            <td><?php echo $k->nik ?></td>
            <td><?php echo $k->nama_pegawai ?></td>
            <td><?php echo $k->jam_pulang ?></td>
            <td><?php echo $k->tanggal ?></td>
            <td><?php echo $k->bulan ?></td>
            <td><?php echo $k->tahun ?></td>
            <td><?php echo $k->status ?></td>
            <td><?php echo $k->keterangan ?></td>
            <td><?php echo $k->deskripsi ?></td>
            <td><?php echo $k->nama_jabatan ?></td>
            <td><img src="<?php echo base_url().'assets/photo/'.$k->photo?>" width="60px"></td>
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/presensipulang/updateData/'.$k->id_presensi_pulang)?>"><i class="fas fa-edit"></i></a>
                </center>
            </td>
        </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->