                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    
                    <div class="card" style="width:70%">
                    	<div class="card-body">
                    		<form method="Post" action="<?php echo base_url('admin/tambahanGaji/TambahDataAksi')?>">
                    			<div class="form-group">
                    				<label>Jenis Tambahan Gaji</label>
                    				<input type="text" name="jenis_tambahan" class="form-control">
                    				<?php echo form_error('jenis_tambahan') ?>
                    			</div>
                    			<div class="form-group">
                    				<label>Jumlah Tambahan Gaji</label>
                    				<input type="number" name="jml_tambahan" class="form-control">
                    				<?php echo form_error('jml_tambahan') ?>
                    			</div>
                    			<button type="submit" class="btn btn-primary">Simpan</button>
                    		</form>
                    		
                    	</div>
                    </div>

                </div>



