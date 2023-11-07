                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <div class="card">
                        <?php foreach($pegawai as $p) : ?>
                        <div class="card-body" style="width: 60%; margin-bottom: 100px;">
                            <form method="POST" action="<?php echo base_url('admin/inputabsensi/tambahDataAksi')?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nik</label>
                                <input type="text" name="nik" class="form-control" readonly value="<?php echo $p->nik ?>">
                                <input type="hidden" name="keterangan" value="Validation" class="form-control">
                                <?php echo form_error('nik','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Nama pegawai</label><br>
                                <input readonly type="text" class="form-control"name="nama_pegawai" value="<?php echo $p->nama_pegawai ?>">
                                <?php echo form_error('nama_pegawai','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Jam</label><br>
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <input type="text" name="jam" value= " <?= date('H:i:s');?>" class="form-control" readonly>
                                <?php echo form_error('nama_pegawai','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input  readonly type="text" class="form-control"name="nama_jabatan" value="<?php echo $p->jabatan ?>">
                                <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" value="<?= date('d');?>" readonly>
                                <?php echo form_error('tanggal','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Bulan</label>
                                <input type="text" name="bulan" class="form-control" value="<?= date('m');?>" readonly>
                                <?php echo form_error('bulan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" name="tahun" class="form-control" value="<?= date('Y');?>" readonly>
                                <?php echo form_error('tahun','<div class="text-small text-danger"></div>')?>
                            </div>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                </select>
                                <?php echo form_error('status','<div class="text-small text-danger"></div>')?>
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
