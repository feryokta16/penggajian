                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <div class="card" style="width:60%">
                        <div class="card-body">
                            <form action="<?php echo base_url('admin/dataJabatan/TambahDataAksi')?>" method="POST">
                        <div class="form-group">
                            <label>Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" class="form-control">
                            <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>')?>
                        </div>
                        <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" name="gaji_pokok" class="form-control">
                            <?php echo form_error('gaji_pokok','<div class="text-small text-danger"></div>')?>
                        </div>
                        <div class="form-group">
                            <label>Uang Transport</label>
                            <input type="text" name="uang_transport" class="form-control">
                            <?php echo form_error('uang_transport','<div class="text-small text-danger"></div>')?>
                        </div>
                        <div class="form-group">
                            <label>BPJS</label>
                            <input type="text" name="Bpjs" class="form-control">
                            <?php echo form_error('Bpjs','<div class="text-small text-danger"></div>')?>
                        </div>
                        <div class="form-group">
                            <label>Lembur/Hari</label>
                            <input type="text" name="jml_tambahan" class="form-control">
                            <?php echo form_error('jml_tambahan','<div class="text-small text-danger"></div>')?>
                        </div>
                        <div class="form-group">
                            <label>Alpha/Hari</label>
                            <input type="text" name="jml_potongan" class="form-control">
                            <?php echo form_error('jml_potongan','<div class="text-small text-danger"></div>')?>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>



