<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
          
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Resi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Order <?php echo form_error('id_order') ?></label>
            <input type="text" class="form-control" name="id_order" id="id_order" placeholder="Id Order" value="<?php echo $id_order; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Request Pickup <?php echo form_error('tanggal_transaksi') ?></label>
            <input type="date" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo $tanggal_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pengirim <?php echo form_error('nama_pengirim') ?></label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim" value="<?php echo $nama_pengirim; ?>" />
        </div>
          <div class="form-group">
            <label for="varchar">Alamat Pengirim <?php echo form_error('alamat_pengirim') ?></label>
            <input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" placeholder="alamat Pengirim" value="<?php echo $alamat_pengirim; ?>" />
        </div>
          <div class="form-group">
            <label for="varchar">tlp Pengirim <?php echo form_error('tlp_pengirim') ?></label>
            <input type="text" class="form-control" name="tlp_pengirim" id="tlp_pengirim" placeholder="tlp Pengirim" value="<?php echo $tlp_pengirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Penerima <?php echo form_error('nama_penerima') ?></label>
            <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" placeholder="Nama Penerima" value="<?php echo $nama_penerima; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">alamat Penerima <?php echo form_error('alamat_penerima') ?></label>
            <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima" placeholder="alamat Penerima" value="<?php echo $alamat_penerima; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Telpon Penerima <?php echo form_error('tlp_penerima') ?></label>
            <input type="text" class="form-control" name="tlp_penerima" id="tlp_penerima" placeholder="Telpon Penerima" value="<?php echo $tlp_penerima; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Jenis Barang <?php echo form_error('jenis_barang') ?></label>
            <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" value="<?php echo $jenis_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kantor Asal<?php echo form_error('kantor_asal') ?></label>
            <input type="text" class="form-control" name="kantor_asal" id="kantor_asal" placeholder="Kantor Asal" value="<?php echo $kantor_asal; ?>" />
        </div>
          <div class="form-group">
            <label for="varchar">Regional Asal<?php echo form_error('regional_asal') ?></label>
            <input type="text" class="form-control" name="regional_asal" id="regional_asal" placeholder="Regional Asal" value="<?php echo $regional_asal; ?>" />
        </div>
         <div class="form-group">
            <label for="varchar">Kantor Tujuan <?php echo form_error('kantor_tujuan') ?></label>
            <input type="text" class="form-control" name="kantor_tujuan" id="kantor_tujuan" placeholder="Kantor Tujuan" value="<?php echo $kantor_tujuan; ?>" />
        </div>
         <div class="form-group">
            <label for="varchar">Regional Tujuan <?php echo form_error('regional_tujuan') ?></label>
            <input type="text" class="form-control" name="regional_tujuan" id="regional_tujuan" placeholder="Regional Tujuan" value="<?php echo $regional_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Berat Barang <?php echo form_error('berat_barang') ?></label>
            <input type="text" class="form-control" name="berat_barang" id="berat_barang" placeholder="Berat Barang" value="<?php echo $berat_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bea  Kirim <?php echo form_error('bea_kirim') ?></label>
            <input type="text" class="form-control" name="bea_kirim" id="bea_kirim" placeholder="Bea Kirim" value="<?php echo $bea_kirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Harga <?php echo form_error('total_harga') ?></label>
            <input type="text" class="form-control" name="total_harga" id="total_harga" placeholder="Total Harga" value="<?php echo $total_harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Petugas <?php echo form_error('id_petugas') ?></label>
              <select name="id_petugas" class="form-control">
                    <option value="" >Nama Petugas</option>
                        <?php if ($list_petugas):?>
                        <?php foreach ($list_petugas as $lp):?>
                        <option value="<?php echo $lp->id_petugas?>" <?php if($lp->id_petugas==$id_petugas){echo "selected";}?>><?php echo $lp->nama_lengkap?></option>
                            <?php endforeach?>
                        <?php endif?>
                    </select>
        </div>
	    <input type="hidden" name="kode_resi" value="<?php echo $kode_resi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('resi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>