
    </head>
    <body>
       <!--  <h2 style="margin-top:0px">Regional List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('regional/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('regional/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('regional'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div> --><br>
            

          <div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary "> <b> Daftar List Regional </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                  <a class="btn btn-primary shadow" href="<?php echo site_url('regional/create');?>">
                      <span class="icon  ">
                        <i class="fas fa-user-plus mr-lg-2"></i>
                      </span>Tambah Data Regional</a>
                    <!-- <?php echo anchor(site_url('regional/create'),' <i class="fa fa-user-plus"> </i>  ', 'class="btn btn-primary"'); ?>
                      </span>Tambah Data User </a> -->
                  </div>
                </div>
              </div>

        <!-- <div class="card-body table-responsive"> -->
              <div class="card-body table-responsive shadow">
                <table id="example3" class="shadow table table-bordered table-striped " >
                  <thead class="thead-dark">
            <tr>
                <th>No</th>
		<th>Regional</th>
        <th>Nama Kota</th>
		<th>Cabang Regional</th>
        <th>Nopend</th>
		<th>Tipe Kantor</th>
		<th>Action</th>
            </tr></thead>
            <tbody>
                <?php
            foreach ($regional_data as $regional)
            {
                ?>
                <tr>
			<td width="40px"><?php echo ++$start ?></td>
			<td><?php echo $regional->regional ?></td>
            <td><?php echo $regional->nama_kota ?></td>
			<td><?php echo $regional->cabang_regional ?></td>
            <td><?php echo $regional->nopend ?></td>
			<td><?php echo $regional->tipe_kantor ?></td>
			<td style="text-align:center" width="100px">
				<?php 
                            echo anchor(site_url('regional/read/'.$regional->id_regional),'<div class="btn btn-primary btn-sm" title="Lihat Selengkapnya"><i class="fa fa-search-plus" ></i></div>'); 
                            echo ' | '; 
                            echo anchor(site_url('regional/update/'.$regional->id_regional),' <i class="fa fa-edit"></i>'); 
                            // echo ' | '; 
                            // echo anchor(site_url('regional/delete/'.$regional->id_petugas),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        <!-- <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('regional/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->
    </body>
</html>