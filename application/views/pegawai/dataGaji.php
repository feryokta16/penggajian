<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
    </div>

	<table class="table table-striped table-bordered">
		<tr>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>rekening</th>
			<th>jabatan</th>
			<th>Gaji Pokok</th>
			<th>Uang Transport</th>
			<th>BPJS</th>
			<th>tambahan</th>
			<th>Potongan</th>
			<th>Total Gaji</th>
			<th>Cetak Slip</th>
		</tr>
		<?php foreach($gaji as $g) : ?>
		<tr>
			<td><?php echo substr ($g->bulan, 0,1 ) ?></td>
            <td><?php echo substr ($g->bulan, 3,4 ) ?></td>
            <td><?php echo ($g->no_rekening) ?></td>
            <td><?php echo ($g->nama_jabatan) ?></td>
			<td><?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
			<td><?php echo number_format($g->uang_transport,0,',','.') ?></td>
			<td><?php echo number_format($g->Bpjs,0,',','.') ?></td>
			<td><?php echo number_format($g->jml_tambahan,0,',','.') ?></td>
			<td><?php echo number_format($g->jml_potongan,0,',','.') ?></td>
			<td><?php echo number_format($g->total_gaji,0,',','.') ?></td>
			<td>
				<center>
					<a class="btn btn-sm btn btn-success" href=" <?php echo base_url('pegawai/dataGaji/cetakSlip/'.$g->id_gaji) ?> "><i class="fas fa-print"></i></a>
				</center>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>