                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <div class="card">
                        <?php foreach($lembur as $p) : ?>
                            <form method="POST" action="<?php echo base_url('admin/datalembur/UpdateDataAksi')?>" enctype="multipart/form-data">
                        <div class="card-body" style="width: 60%; margin-bottom: 100px;">
                            <div class="form-group">
                                <label>Nik</label>
                                <input type="hidden" name="id_lembur" class="form-control" readonly value="<?php echo $p->id_lembur ?>">
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
                                <input  readonly type="text" class="form-control"name="nama_jabatan" value="<?php echo $p->nama_jabatan ?>">
                                <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="number" name="tanggal" class="form-control" value="<?php echo $p->tanggal ?>" readonly >
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
                                <input type="text" name="status" value="Lembur" readonly="" class="form-control">
                                <?php echo form_error('status','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Laporan Lembur</label>
                                <input type="text" name="laporan_lembur"  class="form-control" value="<?php echo $p->laporan_lembur ?>" readonly>
                                <?php echo form_error('status','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>keterangan</label>
                                <select name="keterangan" class="form-control">
                                <option value="<?php echo $p->keterangan ?>"><?php echo $p->keterangan ?></option>
                                <option value="Diterima">Diterima</option>
                                <option value="Validation">Validation</option>
                                <option value="Tidak Memenuhi Syarat">Tidak Memenuhi syarat</option>
                                </select>
                                <?php echo form_error('keterangan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-primary"> simpan</button>
                            </form>  
                        </div>
                    </div>
                </div>
