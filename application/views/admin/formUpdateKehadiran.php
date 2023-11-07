                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <?php foreach ($presents as $k) : ?>
                    <div class="card">
                        <div class="card-body" style="width: 60%; margin-bottom: 100px;">
                            <form method="POST" action="<?php echo base_url('admin/datakehadiran/UpdateDataAksi')?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nik</label>
                                <input type="hidden" readonly name="id_presents" class="form-control"value="<?php echo $k->id_presents ?>">
                                <input  readonly type="number" name="nik" class="form-control"value="<?php echo $k->nik ?>">
                                <?php echo form_error('nik','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Nama pegawai</label>
                                  <input readonly type="text" name="nama_pegawai" class="form-control" value="<?php echo $k->nama_pegawai ?>" >
                                <?php echo form_error('nama_pegawai','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input readonly type="text" name="nama_jabatan" class="form-control" value="<?php echo $k->nama_jabatan ?>" >
                                <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input readonly type="number" name="tanggal" class="form-control" value="<?php echo $k->tanggal ?>" >
                                <?php echo form_error('tanggal','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Bulan</label>
                            <input readonly type="number" name="bulan" class="form-control" value="<?php echo $k->bulan ?>" >
                                <?php echo form_error('bulan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input readonly type="text" name="tahun" class="form-control" value="<?php echo $k->tahun ?>" >
                                <?php echo form_error('tahun','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                <option value="<?php echo $k->status ?>"><?php echo $k->status ?></option>
                                <option value="Hadir">Hadir</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                <option value="Alpha">Alpha</option>
                                </select>
                                <?php echo form_error('status','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <select name="keterangan" class="form-control">
                                <option value="<?php echo $k->keterangan ?>"><?php echo $k->keterangan ?></option>
                                <option value="Diterima">Diterima</option>
                                <option value="Validation">Validation</option>
                                </select>
                                <?php echo form_error('keterangan','<div class="text-small text-danger"></div>')?>
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary"> simpan</button>
                            </form>  
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
