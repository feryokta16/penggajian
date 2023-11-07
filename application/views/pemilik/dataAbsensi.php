                <!-- Begin Page Content -->
                <div class="container-fluid" style="padding-bottom: 100px;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <div class="card mb-3">
				  <div class="card-header bg-gradient-success text-white">
				    Filter Data Absensi pegawai
				  </div>
				  <div class="card-body">
				  <form class="form-inline">
					  <div class="form-group mb-2">
					    <label for="staticEmail2">Bulan :</label>
					    <select class="form-control ml-3" name="bulan">
					    	<option value="">Pilih Bulan</option>
					    	<option value="01">Januari</option>
					    	<option value="02">Februari</option>
					    	<option value="03">Maret</option>
					    	<option value="04">April</option>
					    	<option value="05">Mei</option>
					    	<option value="06">Juni</option>
					    	<option value="07">Juli</option>
					    	<option value="08">Agustus</option>
					    	<option value="09">September</option>
					    	<option value="10">Oktober</option>
					    	<option value="11">November</option>
					    	<option value="12">Desember</option>
					    </select>
					  </div>
					  <div class="form-group mb-2 ml-5">
					    <label for="staticEmail2">Tahun : </label>
					    <select class="form-control ml-3" name="tahun">
					    	<option value="">Pilih Tahun</option>
					    	<?php $tahun = date('Y');
					    	for($i=2023;$i<$tahun+5;$i++){ ?>
					    	<option value="<?php echo $i ?>"><?php echo $i ?></option>
					    <?php } ?>
					    </select>
					  </div>
					  <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class=" fas fa-eye"></i>Tampilkan Data</button>
					  <!---<a href="<?php echo base_url('admin/dataAbsensi/inputAbsensi') ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus">Input Data Kehadiran</i></a>-->
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
					</form>
				  </div>
				</div>
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
				<div class="alert alert-info">
					Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"> <?php echo $bulan ?></span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?></span>
				</div>
				<?php
				$jml_data = count($absensi);
				if($jml_data > 0){
				?>
				<table class="table table-bordered table-striped"id="dataTable" width="100%" cellspacing="0">
					<thead>
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
				</thead>
				<tbody>
					<?php $no=1;  foreach ($absensi as $a) : ?>
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
				</tbody>
				</table>
			<?php }else{ ?>
				<span class="badge badge-danger"><i class="fas fa-info-circle"> Data masih kosong</i></span>
			<?php  }?>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        Data Absensi Masih kosong silahkan input absensi terlebih dahulu pada bulan dan tahun yang anda
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>