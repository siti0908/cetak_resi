
    <head>
        
    </head>
    <body>
        <h2 style="margin-top:0px">Data_pickup Read</h2>
        <table class="table">
	    <tr><td>Tanggal Transaksi</td><td><?php echo $tanggal_transaksi; ?></td></tr>
	    <tr><td>Nama Pengirim</td><td><?php echo $nama_pengirim; ?></td></tr>
	    <tr><td>Alamat Pengirim</td><td><?php echo $alamat_pengirim; ?></td></tr>
	    <tr><td>Tlp Pengirim</td><td><?php echo $tlp_pengirim; ?></td></tr>
	    <tr><td>Nama Penerima</td><td><?php echo $nama_penerima; ?></td></tr>
	    <tr><td>Alamat Penerima</td><td><?php echo $alamat_penerima; ?></td></tr>
	    <tr><td>Tlp Penerima</td><td><?php echo $tlp_penerima; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Jenis Barang</td><td><?php echo $jenis_barang; ?></td></tr>
	    <tr><td>Berat</td><td><?php echo $berat; ?></td></tr>
	    <tr><td>Bea Kirim</td><td><?php echo $bea_kirim; ?></td></tr>
	    <tr><td>Total Harga</td><td><?php echo $total_harga; ?></td></tr>
	    <tr><td>Jenis Pembayaran</td><td><?php echo $jenis_pembayaran; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_pickup') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>