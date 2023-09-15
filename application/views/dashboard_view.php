 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <!-- <li class="breadcrumb-item active">Dashboard</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
    
        <div class="row ">
       <!--    <div class="col-lg-2 col-6">
</div> -->
 <?php if ($_SESSION['hak_akses'] == 'Admin'){
      ?>
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jml_petugas?></h3>

                <p>PETUGAS</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="<?php echo site_url('petugas');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        
            </div>
          </div> 

        
          <!-- ./kantor -->

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jml_kantor?></h3>

                <p>Kantor</p>
              </div>
              <div class="icon">
                <i class="fas fa-city"></i>
              </div>
           
              <a href="<?php echo site_url('kantor');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
             <?php
       }
       ?> 
          <!-- ./col -->
          <div class="col-lg-3 col-6 text">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $jml_pickup?></h3>

                <p>Data Pickup Belum Diapprove</p>
              </div>
              <div class="icon">
                <i class="fas fa-boxes"></i>
              </div>
              <a href="<?php echo site_url('data_pickup');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
               <!-- <div class="col-lg-2 col-6">
</div> -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $jml_resi?></h3>

                <p>Data Resi</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="<?php echo site_url('resi');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
   
    </section>

    <!-- /.content -->
  <div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary "> <b> Daftar List Data Pickup Belum Di Approve </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                  <a class="btn btn-primary shadow" href="<?php echo site_url('data_pickup');?>">
                      <span class="icon  ">
                        <i class="fas fa-arrow-circle-right mr-lg-2"></i>
                      </span>More Info </a>
                  </div>
                </div>
              </div>

        
              <div class="card-body table-responsive  shadow">
                <table id="example3" class="shadow table table-bordered table-striped " >
                  <thead class="thead-dark">
            <tr>
                <!-- <th>No</th> -->
    <th>Tanggal Transaksi</th>
    <th>Nama Pengirim</th>
    <th>Alamat Pengirim</th>
    <!-- <th>Telpon Pengirim</th> -->
    <th>Nama Penerima</th>
    <th>Alamat Penerima</th>
    <!-- <th>Telpon Penerima</th> -->
    <th>Nama Barang</th>
    <!-- <th>Jenis Barang</th> -->
    <th>Berat</th>
    <th>Bea Kirim</th>
    <th>Total Harga</th>
    <th>Jenis Pembayaran</th>
   
            </tr> </thead>
                  <tbody><?php
            foreach ($data_pickup_data as $data_pickup)
            {
                ?>
                <tr>
      <!-- <td width="80px"><?php echo ++$start ?></td> -->
      <td><?php echo $data_pickup->tanggal_transaksi ?></td>
      <td><?php echo $data_pickup->nama_pengirim ?></td>
      <td><?php echo $data_pickup->alamat_pengirim ?></td>
      <!-- <td><?php echo $data_pickup->tlp_pengirim ?></td> -->
      <td><?php echo $data_pickup->nama_penerima ?></td>
      <td><?php echo $data_pickup->alamat_penerima ?></td>
      <!-- <td><?php echo $data_pickup->tlp_penerima ?></td> -->
            <td><?php echo $data_pickup->nama_barang ?></td>
      <!-- <td><?php echo $data_pickup->jenis_barang ?></td> -->
      <td><?php echo $data_pickup->berat ?></td>
      <td><?php echo $data_pickup->bea_kirim ?></td>
      <td><?php echo $data_pickup->total_harga ?></td>
      <td><?php echo $data_pickup->jenis_pembayaran ?></td>
    
    </tr>
                <?php
            }
            ?>
             </tbody>
        </table>
    </div>
         </div>
            
        </section>