
    <head>
       
    </head>
    <body>
        <h2 style="margin-top:0px">Data_pickup <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="timestamp">Tanggal Transaksi <?php echo form_error('tanggal_transaksi') ?></label>
            <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo $tanggal_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pengirim <?php echo form_error('nama_pengirim') ?></label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim" value="<?php echo $nama_pengirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Pengirim <?php echo form_error('alamat_pengirim') ?></label>
            <input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" placeholder="Alamat Pengirim" value="<?php echo $alamat_pengirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tlp Pengirim <?php echo form_error('tlp_pengirim') ?></label>
            <input type="text" class="form-control" name="tlp_pengirim" id="tlp_pengirim" placeholder="Tlp Pengirim" value="<?php echo $tlp_pengirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Penerima <?php echo form_error('nama_penerima') ?></label>
            <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" placeholder="Nama Penerima" value="<?php echo $nama_penerima; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Penerima <?php echo form_error('alamat_penerima') ?></label>
            <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima" placeholder="Alamat Penerima" value="<?php echo $alamat_penerima; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tlp Penerima <?php echo form_error('tlp_penerima') ?></label>
            <input type="text" class="form-control" name="tlp_penerima" id="tlp_penerima" placeholder="Tlp Penerima" value="<?php echo $tlp_penerima; ?>" />
        </div>
	    
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
          <div class="form-group">
            <label for="enum">Jenis Barang <?php echo form_error('jenis_barang') ?></label>
            <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="jenis Barang" value="<?php echo $jenis_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Berat <?php echo form_error('berat') ?></label>
            <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" value="<?php echo $berat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bea Kirim <?php echo form_error('bea_kirim') ?></label>
            <input type="text" class="form-control" name="bea_kirim" id="bea_kirim" placeholder="Bea Kirim" value="<?php echo $bea_kirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Harga <?php echo form_error('total_harga') ?></label>
            <input type="text" class="form-control" name="total_harga" id="total_harga" placeholder="Total Harga" value="<?php echo $total_harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Pembayaran <?php echo form_error('jenis_pembayaran') ?></label>
            <input type="text" class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" placeholder="Jenis Pembayaran" value="<?php echo $jenis_pembayaran; ?>" />
        </div>
         <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_pickup" value="<?php echo $id_pickup; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_pickup') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>