
    <body>
        <h2 style="margin-top:0px">User Read</h2>
        <table class="table">
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Nipos</td><td><?php echo $nipos; ?></td></tr>
	    <tr><td>No Telp</td><td><?php echo $no_telp; ?></td></tr>
	    <tr><td>Status Pegawai</td><td><?php echo $status_pegawai; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Hak Akses</td><td><?php echo $hak_akses; ?></td></tr>
	    <tr><td>Id Kantor</td><td><?php echo $id_kantor; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('petugas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>