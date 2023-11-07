                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
                    </div>
                    <?php echo $this->session->flashdata('pesan')?>
                    <table class="table table-bordered table-striped "id="dataTable" width="100%" cellspacing="0">
                    	<thead>
                        <tr>
                    	<th class="text-center">No</th>
                    	<th class="text-center">Jenis Potongan</th>
                    	<th class="text-center">Jumlah Potongan</th>
                    	</tr>
                    </thead>
                    <tbody>
                    	<?php $no=1; foreach($pot_gaji as $p) : ?>
                    	<tr>
                    		<td><?php echo $no++ ?></td>
                    		<td><?php echo $p->potongan ?></td>
                    		<td><?php echo number_format($p->jml_potongan,0,',','.') ?></td>
                    	</tr>
                    <?php endforeach; ?>
                </tbody>
                    </table>
                </div>



