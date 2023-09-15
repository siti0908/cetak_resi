<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Barang List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('barang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('barang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('barang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
         <div class="box box-primary">
<div class="box-header">
<h3 class="box-title"></h3>
</div>
<div class="box-body">
<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped  table-sm" cellspacing="0" width="100%">
<thead>
            <tr>
                <th>No</th>
		<th>Nama Barang</th>
		<th>Jenis Barang</th>
		<th>Berat</th>
		<th>Action</th>
            </tr><?php
            foreach ($barang_data as $barang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $barang->nama_barang ?></td>
			<td><?php echo $barang->jenis_barang ?></td>
			<td><?php echo $barang->berat ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('barang/read/'.$barang->id_barang),'Read'); 
				echo ' | '; 
				echo anchor(site_url('barang/update/'.$barang->id_barang),'<i class="fa fa-edit"></i>'); 
				echo ' | '; 
				echo anchor(site_url('barang/delete/'.$barang->id_barang),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('barang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>