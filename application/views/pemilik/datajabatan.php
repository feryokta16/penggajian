                <!-- Begin Page Content -->
                <div class="container-fluid" style="padding-bottom: 100px;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                        <a class="btn btn-sm btn-success mb-2 ml-auto" href="<?php echo base_url('admin/dataJabatan/tambahData/')?>"><i class="fas fa-plus"></i>Tambah Data</a>
                    </div>
                    
                    <!--<?php echo 
                    $this->session->flashdata('pesan');
                    ?> -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-2" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">Nama Jabatan</th>
                            <th class="text-center">Gaji Pokok</th>
                            <th class="text-center">Uang Transport</th>
                            <th class="text-center">BPJS</th>
                            <th class="text-center">Gaji Bersih</th>
                            <th class="text-center">Lembur/hari</th>
                            <th class="text-center">Potongan Gaji/hari</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($jabatan as $j) : ?>
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $j->nama_jabatan ?></td>
                                <td><?php echo number_format($j->gaji_pokok,0,',','.')?></td>
                                <td><?php echo number_format($j->uang_transport,0,',','.')?></td>
                                <td><?php echo number_format($j->Bpjs,0,',','.')?></td>
                                <td><?php echo number_format($j->gaji_pokok + $j->uang_transport + $j->Bpjs,0,',','.')?></td>
                                <td><?php echo number_format($j->jml_potongan,0,',','.')?></td>
                                <td><?php echo number_format($j->jml_tambahan,0,',','.')?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    
                </div>



