                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                     <div class="card mb-3">
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

                    <div class="alert alert-info bg-gradient-success" >
					Silahkan Input Presensi pada bulan : <span class="font-weight-bold"> <?php echo $bulan ?></span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?></span>
				</div>
                    <div class="card mb-3">
				  <div class="card-body " style="background-color: #0EA293">
				  <form class="form-inline "> 
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
					  <div class="form-group mb-3 ml-5">
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
					  <a href="<?php echo base_url('admin/dataAbsensi') ?>" class="btn btn-danger mb-2 ml-2"><i class="fas fa-plus"> Back</i></a>
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
					<!--<td class="text-center">Id Pegawai</td>-->
					<td class="text-center">Jabatan</td>
					<td class="text-center">Status</td>
					<td class="text-center" width="8%">Hadir</td>
					<td class="text-center" width="8%">lembur</td>
					<td class="text-center" width="8%">Alpa</td>
					<td class="text-center" width="8%">izin</td>
					<td class="text-center" width="8%">sakit</td>	
					</tr>
					<?php $no=1;  foreach ($input_absensi as $a) : ?>
						<tr>
						<input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun?> ">
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
							<td><input type="number" name="hadir[]" class="form-control" value="0"></td>
							<td><input type="number" name="lembur[]" class="form-control" value="0"></td>
							<td><input type="number" name="alpha[]" class="form-control" value="0"></td>
							<td><input type="number" name="izin[]" class="form-control" value="0"></td>
							<td><input type="number" name="sakit[]" class="form-control" value="0"></td>
						</tr>
					<?php endforeach; ?>
					
				</table>
				<?php
				$jml_data = count($input_absensi);
				if($jml_data > 0){
				?>
					<button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Simpan data</button>		
				<?php }else{ ?>
				<span class="badge badge-danger"><i class="fas fa-info-circle"> Data Sudah diisi</i></span>
			<?php  }?>
				</form>

                </div>