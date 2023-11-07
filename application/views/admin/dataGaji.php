                <!-- Begin Page Content -->
                <div class="container-fluid" style="padding-bottom: 100px;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <div class="card mb-3" style="background-color: #0EA293">
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
				<div class="alert alert-info bg-gradient-success text-white">
					Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"> <?php echo $bulan ?></span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?></span>
				</div>
				  <div class="card-body"  style="background-color: #0EA293">
				  <form class="form-inline">
					  <div class="form-group mb-2">
					    <label for="staticEmail2" style="color: white">Bulan :</label>
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
					    <label for="staticEmail2" style="color: white">Tahun : </label>
					    <select class="form-control ml-3" name="tahun">
					    	<option value="">Pilih Tahun</option>
					    	<?php $tahun = date('Y');
					    	for($i=2023;$i<$tahun+5;$i++){ ?>
					    	<option value="<?php echo $i ?>"><?php echo $i ?></option>
					    <?php } ?>
					    </select>
					  </div>
					  <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class=" fas fa-eye"></i>Tampilkan Data</button>
					  <a href="<?php echo base_url('admin/dataPenggajian/inputAbsensi') ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus">Input Data Gaji</i></a>
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
					  <?php if(count($gaji) > 0 ) { ?>
		  			<a href="<?php echo base_url('admin/dataPenggajian/cetakLaporan?bulan='.$bulan),'&tahun='.$tahun?>" class="btn btn-danger mb-2 ml-3"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
		  			<?php }else{ ?>
			  			<button type="button" class="btn btn-danger mb-2 ml-3" data-toggle="modal" data-target="#exampleModal">
			  			<i class="fas fa-print"></i> Cetak Daftar Gaji</button>
				<?php } ?>
					</form>
				  </div>
				</div>
				<?php
				$jml_data = count($gaji);
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
					<td class="text-center">Gaji Pokok</td>
					<td class="text-center">Uang Transport</td>
					<td class="text-center">Tunjangan Kesehatan</td>
					<td class="text-center">Lembur</td>	
					<td class="text-center">Potongan</td>
					<td class="text-center">Total Gaji</td>
					<td class="text-center">Slip Gaji Pegawai</td>
					</tr>
				</thead>
				<tbody>
					<?php $no=1;  foreach ($gaji as $a) : ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $a->nik ?></td>
							<td><?php echo $a->nama_pegawai ?></td>
							<td><?php echo $a->jenis_kelamin ?></td>
							<td><?php echo $a->nama_jabatan ?></td>
							<td>Rp.<?php echo number_format($a->gaji_pokok,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($a->uang_transport,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($a->Bpjs,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($a->jml_tambahan,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($a->jml_potongan,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($a->total_gaji,0,',','.') ?></td>
							<td>
								<center>
									<a class="btn btn-sm btn btn-success" href=" <?php echo base_url('admin/dataPenggajian/cetakGaji/'.$a->id_gaji) ?> "><i class="fas fa-print"></i></a>
								</center>
							</td>
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