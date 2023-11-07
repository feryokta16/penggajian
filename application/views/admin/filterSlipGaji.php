	<!-- Begin Page Content -->
	<div class="container-fluid">

	  <!-- Page Heading -->
	  <div class="card mx-auto" style="width: 90%">
	   <div class="card-header bg-success text-white">Filter Slip Gaji</div>
	   		<form method="post" action="<?php echo base_url('admin/slipGaji/cetakSlipGaji')?>">
	   <div class="card-body">
	  	<div class="form-group">
	    <label for="exampleInputEmail1">Bulan</label>
	   	<select class="form-control" name="bulan">
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
	  	<div class="form-group">
	    <label for="exampleInputEmail1">Tahun</label>
		    <select class="form-control " name="tahun">
				<option value="">Pilih Tahun</option>
				<?php $tahun = date('Y');
				for($i=2023;$i<$tahun+5;$i++){ ?>
				<option value="<?php echo $i ?>"><?php echo $i ?></option>
				<?php } ?>
			</select>
	  	</div>
	  	<div class="form-group">
	    <label for="exampleInputEmail1">Nama Pegawai</label>
		    <select class="form-control " name="id_pegawai">
			<option value="">Pilih Pegawai</option>
			<?php foreach ($pegawai as $p) : ?>
				<option value="<?php echo $p->id_pegawai ?>"><?php echo $p->nama_pegawai?></option>
			<?php endforeach; ?>
			</select>
	  	</div>
	  	</div>
		<button style="width: 100%" type="submit" class="btn btn-success mb-4"><i class=" fas fa-eye"></i>Tampilkan Data</button>
	  </div>
	  
	</form>
	</div>
	<!-- /.container-fluid -->