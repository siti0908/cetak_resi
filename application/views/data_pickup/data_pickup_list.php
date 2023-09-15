    </head>
    <body>
        <br>
          
       <!--  <h2 style="margin-top:0px">Kelola Data Pickup</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            <?php echo anchor(site_url('data_pickup/create'),'<i class="fa fa-download"></i>', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('data_pickup/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('data_pickup'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
              <div class="table-responsive">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div> -->
              <!-- /.card-header -->
             <!--  <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead> -->
                    <div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary "> <b> Daftar List Data Pickup </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                  <a class="btn btn-success shadow" href="<?php echo site_url('data_pickup/importdatapickup');?>">
                      <span class="icon  ">
                        <i class="fa fa-download mr-lg-2"></i>
                      </span>Import Data Pickup </a>


                  </div>
                   <form action = "<?php echo site_url('data_pickup/approve/')?>" method = 'POST'>
                    <button class = "btn btn-primary" type="submit">Approve</button>
                    </form>
                </div>
              </div>

        
              <div class="card-body table-responsive  shadow">
                <table id="example3" class="shadow table table-bordered table-striped " >
                  <thead class="thead-dark">
            <tr>
                <th>No</th>
		<th>Tanggal Transaksi</th>
		<th>Nama Pengirim</th>
		<th>Alamat Pengirim</th>
		<th>Telpon Pengirim</th>
		<th>Nama Penerima</th>
		<th>Alamat Penerima</th>
		<th>Telpon Penerima</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Kantor Asal</th>
        <th>Regional Asal</th>
        <th>Kantor Tujuan</th>
		<th>Regional Tujuan</th>
		<th>Berat Berat</th>
		<th>Bea Kirim</th>
		<th>Total Harga</th>
        <th>Jenis Pembayaran</th>
		<th>Status</th>
		<th>Action</th>
            </tr> </thead>
                  <tbody><?php
            foreach ($data_pickup_data as $data_pickup)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $data_pickup->tanggal_transaksi ?></td>
			<td><?php echo $data_pickup->nama_pengirim ?></td>
			<td><?php echo $data_pickup->alamat_pengirim ?></td>
			<td><?php echo $data_pickup->tlp_pengirim ?></td>
			<td><?php echo $data_pickup->nama_penerima ?></td>
			<td><?php echo $data_pickup->alamat_penerima ?></td>
			<td><?php echo $data_pickup->tlp_penerima ?></td>
            <td><?php echo $data_pickup->nama_barang ?></td>
            <td><?php echo $data_pickup->jenis_barang ?></td>
            <td><?php echo $data_pickup->kantor_asal ?></td>
            <td><?php echo $data_pickup->regional_asal ?></td>
            <td><?php echo $data_pickup->kantor_tujuan ?></td>
			<td><?php echo $data_pickup->regional_tujuan ?></td>
			<td><?php echo $data_pickup->berat_barang ?></td>
			<td><?php echo $data_pickup->bea_kirim ?></td> 
			<td><?php echo $data_pickup->total_harga ?></td>
            <td><?php echo $data_pickup->jenis_pembayaran ?></td>
                <td><center><?php if($data_pickup->status=="Approve"){
                                echo "<span class='badge badge-success  rounded-pill' style='background-color:green;color:#fff'> Approve  </span>";
                            } else{
                           echo "<span class='badge badge-danger  rounded-pill' style='background-color: #EA2027;color:#000'>Belum diapprove</span>";
                            }?></center></td>
			<!-- <td><?php echo $data_pickup->status ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('data_pickup/read/'.$data_pickup->id_pickup),'<div class="btn btn-primary btn-sm" title="Lihat Selengkapnya"><i class="fa fa-search-plus" ></i></div>'); 
				echo ' | '; 
				echo anchor(site_url('data_pickup/update/'.$data_pickup->id_pickup),'<i class="fa fa-edit"></i>'); 
				// echo ' | '; 
				// echo anchor(site_url('data_pickup/delete/'.$data_pickup->id_pickup),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>

			</td>
		</tr>
                <?php
            }
            ?>
             </tbody>
        </table>
    </div>
         </div>
  
            
       <!--  <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('data_pickup/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->

<!-- DataTables  & Plugins -->

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
    </body>
</html>