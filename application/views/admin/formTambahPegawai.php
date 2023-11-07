                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <div class="card">
                        <div class="card-body" style="width: 60%; margin-bottom: 100px;">
                            <form method="POST" action="<?php echo base_url('admin/dataPegawai/tambahDataAksi')?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nik</label>
                                <input type="number" name="nik" class="form-control">
                                <?php echo form_error('nik','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Nama pegawai</label>
                                <input type="text" name="nama_pegawai" class="form-control">
                                <?php echo form_error('nama_pegawai','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                                <?php echo form_error('username','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <?php echo form_error('password','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Rekening</label>
                                <input type="text" name="no_rekening" class="form-control">
                                <?php echo form_error('no_rekening','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">perempuan</option>
                                </select>
                                <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="jabatan" class="form-control">
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach($jabatan as $j) : ?>
                                    <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('jabatan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control">
                                <?php echo form_error('tanggal_masuk','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                <option value="">pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Aktif">Tidak Aktif</option>
                                </select>
                                <?php echo form_error('status','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <select name="hak_akses" class="form-control">
                                    <option value="">pilih hak akses</option>
                                    <option value="1">admin</option>
                                    <option value="2">pegawai</option>
                                    <option value="3">CEO</option>
                                    <option value="4">Tidak Aktif</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary"> simpan</button>
                            </form>  
                        </div>
                    </div>
                </div>
