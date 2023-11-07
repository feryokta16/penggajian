                <!-- Begin Page Content -->

                <script>
                    function changeNik() {
                        document.getElementById('frmPost').action = "<?php echo base_url('admin/datakehadiran/tambahData')?>";
                        document.getElementById('frmPost').submit();
                    }
                </script>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <div class="card">
                        <div class="card-body" style="width: 60%; margin-bottom: 100px;">
                            <form id="frmPost" method="POST" action="<?php echo base_url('admin/datakehadiran/tambahDataAksi')?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nik</label>
                                <select name="nik" class="form-control" onchange="changeNik()">
                                    <option value="">Pilih Nik</option>
                                    <?php foreach($pegawai as $p) : ?>
                                    <option value="<?php echo $p->nik ?>" <?= $lookupPegawai ? ($lookupPegawai[0]->nik==$p->nik ? 'selected' : '') : '' ?>><?php echo $p->nik ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <input type="hidden" name="jam" value= " <?= date('H:i:s');?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama pegawai</label>
                                <input type="text" name="nama_pegawai" value="<?= $lookupPegawai ? $lookupPegawai[0]->nama_pegawai : '' ?>" class="form-control" readonly>
                                <?php echo form_error('nama_pegawai','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control" value="<?= $lookupPegawai ? $lookupPegawai[0]->jabatan : '' ?>" readonly>
                                <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" value="<?= date('d');?>" readonly>
                                <?php echo form_error('tanggal','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Bulan</label>
                                <input type="text" name="bulan" class="form-control" value="<?= date('M');?>" readonly>
                                <?php echo form_error('bulan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" name="tahun" class="form-control" value="<?= date('Y');?>" readonly>
                                <?php echo form_error('tahun','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" value="Alpha" readonly class="form-control">
                                <?php echo form_error('status','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" value="Diterima" readonly class="form-control">
                                <?php echo form_error('keterangan','<div class="text-small text-danger"></div>')?>
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
