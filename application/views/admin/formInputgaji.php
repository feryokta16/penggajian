                <!-- Begin Page Content -->
                <div class="container-fluid">

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
					Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold text-gray"> <?php echo $bulan ?></span> Tahun : <span class="font-weight-bold text-gray"><?php echo $tahun ?></span>
				</div>
				  <div class="card-body" style="background-color: #0EA293">
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
					  <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class=" fas fa-eye"></i> Pilih</button>
					  <a href="<?php echo base_url('admin/dataPenggajian') ?>" class="btn btn-danger mb-2 ml-2"><i class="fas fa-plus"> Back</i></a>
					</form>
				  </div>
				</div>
				<form method="POST">
				
				<table class="table table-bordered">
					<tr>
					<td class="text-center">NO</td>
					<td class="text-center">NIK</td>
					<td class="text-center">Nama Pegawai</td>
					<td class="text-center">Jenis Kelamin</td>
					<!---<td class="text-center">Id Pegawai</td>-->
					<td class="text-center">Jabatan</td>
					<td class="text-center">Status</td>
					<td class="text-center" width="8%">Gaji Pokok</td>
					<td class="text-center" width="8%">Tunjangan Transport</td>
					<td class="text-center" width="8%">Tunjangan Kesehatan</td>
					<td class="text-center" width="8%">Tambahan</td>
					<td class="text-center" width="8%">Potongan</td>
					<td class="text-center" width="8%">Total Gaji</td>	
					</tr>
					<?php $no=1;  foreach ($input_absensi as $a) : ?>
					<?php $lembur = $a->lembur * $a->jml_tambahan ?>
					<?php $potongan = $a->alpha * $a->jml_potongan ?>
					<?php $total = $a->gaji_pokok + $a->uang_transport + $a->Bpjs + $lembur - $potongan ?>
						<tr>
						<input type="hidden" name="bulan[]" class="form-control" value="<?php echo $a->bulan?> ">
						<input type="hidden" name="nik[]" class="form-control" value="<?php echo $a->nik?> ">
						<input type="hidden" name="nama_pegawai[]" class="form-control" value="<?php echo $a->nama_pegawai?> ">
						<input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?php echo $a->jenis_kelamin?> ">
						<input type="hidden" name="id_pegawai[]" class="form-control" value="<?php echo $a->id_pegawai?> ">
						<input type="hidden" name="nama_jabatan[]" class="form-control" value="<?php echo $a->jabatan?> ">
						<input type="hidden" name="status[]" class="form-control" value="<?php echo $a->status?> ">
							<td><?php echo $no++ ?></td>
							<td><?php echo $a->nik ?></td>
							<td><?php echo $a->nama_pegawai ?></td>
							<td><?php echo $a->jenis_kelamin ?></td>
							<!--<td><?php echo $a->id_pegawai ?></td>-->
							<td><?php echo $a->jabatan ?></td>
							<td><?php echo $a->status ?></td>
							<td>Rp.<?php echo number_format($a->gaji_pokok,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($a->uang_transport,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($a->Bpjs,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($lembur,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($potongan,0,',','.') ?></td>
							<td>Rp.<?php echo number_format($total,0,',','.') ?></td>
							<input type="hidden" name="gaji_pokok[]" class="form-control" value="<?php echo $a->gaji_pokok?>" >
							<input type="hidden" name="uang_transport[]" class="form-control" value="<?php echo $a->uang_transport?>">
							<input type="hidden" name="Bpjs[]" class="form-control" value="<?php echo $a->Bpjs?>">
							<input type="hidden" name="jml_tambahan[]" class="form-control"value="<?php echo $lembur?>" >
							<input type="hidden" name="jml_potongan[]" class="form-control"value="<?php echo $potongan?>" >
							<input type="hidden" name="total_gaji[]" class="form-control"value="<?php echo $total?>" >
						</tr>
					<?php endforeach; ?>
				</table>
				<?php
				$jml_data = count($input_absensi);
				if($jml_data > 0){
				?>
					<button class="btn btn-success mb-2 mr-auto" type="submit" name="submit" value="submit">Simpan data</button>		
				<?php }else{ ?>
			<?php  }?>
				</form>

                </div>