<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="card" style="margin-bottom: 120px">
        <div class="card-header font-weight-bold bg-success text-white">
            Data Pegawai
        </div>
        <?php foreach ($presents as $p) : ?>
        <div class="card-body" align="center">
            <div class="row">
            <div calss col-md-7>
                <img style="width: 250px" src="<?php echo base_url('assets/photo/'.$p->photo) ?>">
            </div>
            <div class="col-md-7">
                <table class="table" align="center" style="margin-top: : 100px" >
        <tr>
            <td width="70px"></td>
            <td width="70px">Nama</td>
            <td>:</td>
            <td><?php echo $p->nama_pegawai ?></td>
        </tr>
        <tr>
            <td width="70px"></td>
            <td width="70px">Jam</td>
            <td>:</td>
            <td><?php echo $p->jam ?></td>
        </tr>
        <tr>
            <td width="70px"></td>
            <td width="70px">Tanggal</td>
            <td>:</td>
            <td><?php echo $p->tanggal ?></td>
        </tr>
        <tr>
            <td width="70px"></td>
            <td width="100px">Bulan</td>
            <td>:</td>
            <td><?php echo $p->bulan ?></td>
        </tr>
           <tr>
            <td width="70px"></td>
            <td width="100px">Tahun</td>
            <td>:</td>
            <td><?php echo $p->tahun ?></td>
        </tr>
           <tr>
            <td width="70px"></td>
            <td width="100px">Status</td>
            <td>:</td>
            <td><?php echo $p->status ?></td>
        </tr>
           <tr>
            <td width="70px"></td>
            <td width="100px">keterangan</td>
            <td>:</td>
            <td><?php echo $p->keterangan ?></td>
        </tr>
    </table>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>