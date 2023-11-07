<!-- Begin Page Content -->
<div class="container-fluid ">

  <!-- Page Heading -->
  <div class="d-sm-flex  align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>
  <div class="alert alert-success font-weight-bold mb-4" style="width: 100%">
        Selamat datang <?php echo $this->session->userdata('nama_pegawai') ?>, anda login sebagai pegawai
    </div>

        <div class="card-header font-weight-bold bg-success text-white mb-4">
            Informasi Kehadiran
        </div>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>NIK</th>
            <th>Nama Pegawai</th>
            <th>Rekening</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th>Hadir</th>
            <th>Lembur</th>
            <th>Alpha</th>
            <th>Izin</th>
            <th>Sakit</th>
            <!---<td>Cetak data Absensi</td>-->
        </tr>
        </tr>
            <?php $no=1;  foreach ($absensi as $a) : ?>
        <tr>
            <td><?php echo substr ($a->bulan, 0,2 ) ?></td>
            <td><?php echo substr ($a->bulan, 2,4 ) ?></td>
            <td><?php echo $a->nik ?></td>
            <td><?php echo $a->nama_pegawai ?></td>
            <td><?php echo $a->no_rekening ?></td>
            <td><?php echo $a->jenis_kelamin ?></td>
            <td><?php echo $a->nama_jabatan ?></td>
            <td><?php echo $a->hadir ?></td>
            <td><?php echo $a->lembur ?></td>
            <td><?php echo $a->alpha ?></td>
            <td><?php echo $a->izin ?></td>
            <td><?php echo $a->sakit ?></td>
            <!---<td>
                <center>
                    <a class="btn btn-sm btn btn-success" href=" <?php echo base_url('pegawai/dataAbsensi/cetakAbsensi/'.$a->id_kehadiran) ?> "><i class="fas fa-print"></i></a>
            </td>-->
        </tr>
            <?php endforeach; ?>
    </table>
</div>
<!-- /.container-fluid -->