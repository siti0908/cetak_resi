<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Resi Read</h2>
        <table class="table">
	    <tr><td>Id Order</td><td><?php echo $id_order; ?></td></tr>
        <tr><td>Tanggal Transaksi</td><td><?php echo $tanggal_transaksi; ?></td></tr>
	    <tr><td>Nama Pengirim</td><td><?php echo $nama_pengirim; ?></td></tr>
	    <tr><td>Alamat Pengirim</td><td><?php echo $alamat_pengirim; ?></td></tr>
	    <tr><td>Tlp Pengirim</td><td><?php echo $tlp_pengirim; ?></td></tr>
	    <tr><td>Nama Penerima</td><td><?php echo $nama_penerima; ?></td></tr>
	    <tr><td>Alamat Penerima</td><td><?php echo $alamat_penerima; ?></td></tr>
	    <tr><td>Telpon Penerima</td><td><?php echo $tlp_penerima; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Jenis Barang</td><td><?php echo $jenis_barang; ?></td></tr>
	    <tr><td>Kantor Asal</td><td><?php echo $kantor_asal; ?></td></tr>
	    <tr><td>Regional Asal</td><td><?php echo $regional_asal; ?></td></tr>
	    <tr><td>Kantor Tujuan</td><td><?php echo $kantor_tujuan; ?></td></tr>
	    <tr><td>Regional Tujuan</td><td><?php echo $regional_tujuan; ?></td></tr>
	    <tr><td>Berat Barang</td><td><?php echo $berat_barang; ?></td></tr>
	    <tr><td>Bea Kirim</td><td><?php echo $bea_kirim; ?></td></tr>
	    <tr><td>Total Harga</td><td><?php echo $total_harga; ?></td></tr>
	    <tr><td>Petugas</td><td><?php echo $id_petugas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('resi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>