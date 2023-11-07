                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                         <a class="btn btn-sm btn-success mb-0 ml-auto" href="<?php echo base_url('admin/dataPegawai/tambahData/')?>"><i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                    <!--<?php echo $this->session->flashdata('pesan') ?> -->

                   <div class="table-responsive">
                           <table class="table table-bordered table-striped mt-2" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                       <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama Pegawai</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Rekening</th>
                            <th class="text-center">Tanggal masuk</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Hak Akses</th>
                            <th class="text-center">Photo</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($pegawai as $p)  : ?>
                         <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $p->nik?></td>
                            <td><?php echo $p->nama_pegawai?></td>
                            <td><?php echo $p->jenis_kelamin?></td>
                            <td><?php echo $p->jabatan?></td>
                            <td><?php echo $p->no_rekening?></td>
                            <td><?php echo $p->tanggal_masuk?></td>
                            <td><?php echo $p->status?></td>
                            <?php if($p->hak_akses=='1') { ?>
                                <td>admin</td>
                                <?php }else if($p->hak_akses=='2'){ ?>
                                    <td>pegawai</td>
                                <?php }else if($p->hak_akses=='3'){ ?>
                                    <td>CEO</td>
                                    <?php }else{ ?>
                                        <td>Tidak Aktif</td>
                                    <?php }?>
                            <td><img src="<?php echo base_url().'assets/photo/'.$p->photo?>" width="60px"></td>
                            <td>
                            <center>
                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPegawai/updateData/'.$p->id_pegawai)?>"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('apakah anda yakin ingin mengehapus data ini')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPegawai/deleteData/'.$p->id_pegawai)?>"><i class="fas fa-trash"></i></a>
                            </center>
                            </td>
                        </tr>   
                        <?php endforeach; ?>
                    </tbody>
                    </table><br><br>
                   </div>
                
                </div>