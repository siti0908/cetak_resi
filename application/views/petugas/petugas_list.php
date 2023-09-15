
    </head>
    <body>
        <br>
          
 
          <div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary "> <b> Daftar List Petugas </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                  <a class="btn btn-primary shadow" href="<?php echo site_url('petugas/create');?>">
                      <span class="icon  ">
                        <i class="fas fa-user-plus mr-lg-2"></i>
                      </span>Tambah Data Petugas </a>
                    <!-- <?php echo anchor(site_url('petugas/create'),' <i class="fa fa-user-plus"> </i>  ', 'class="btn btn-primary"'); ?>
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
                <th>Nama_Lengkap</th>
                <th >Email</th>
                <th>Nipos</th>
                <th>No Telp</th>
                <th>Status_Pegawai</th>
                <th>Alamat</th>
                <th>Username</th>
                <th>Password</th>
                <th>Hak_Akses</th>
                <th>Nama_Kantor</th>
                <th>Action</th>
                </tr>
                 </thead>
                    <tbody><?php
                            foreach ($petugas_data as $petugas)
                            {
                                ?>
                                                    <tr>
                          <td width="3px"><?php echo ++$start ?></td>
                          <td ><?php echo $petugas->nama_lengkap ?></td>
                          <td ><?php echo $petugas->email ?></td>
                          <td ><?php echo $petugas->nipos ?></td>
                          <td ><?php echo $petugas->no_telp ?></td>
                          <td><center><?php if($petugas->status_pegawai=="Aktif"){
                                echo "<span class='badge badge-success  rounded-pill' style='background-color:green;color:#fff'>  Aktif   </span>";
                            } else{
                           echo "<span class='badge badge-danger  rounded-pill' style='background-color: #EA2027;color:#000'>Tidak Aktif</span>";
                            }?></center></td>

                          <!-- <td ><?php echo $petugas->status_pegawai ?></td> -->
                          <td ><?php echo $petugas->alamat ?></td>
                          <td ><?php echo $petugas->username ?></td>
                          <td ><?php echo $petugas->password ?></td>
                          <td ><?php echo $petugas->hak_akses ?></td>
                          <td ><?php echo $petugas->nama_kota ?></td>
                          <td style="text-align:center" width="20px">
                            <?php 
                            echo anchor(site_url('petugas/read/'.$petugas->id_petugas),'<div class="btn btn-primary btn-sm" title="Lihat Selengkapnya"><i class="fa fa-search-plus" ></i></div>'); 
                            echo ' | '; 
                            echo anchor(site_url('petugas/update/'.$petugas->id_petugas),' <i class="fa fa-edit"></i>'); 
                            // echo ' | '; 
                            // echo anchor(site_url('petugas/delete/'.$petugas->id_petugas),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    <?php echo anchor(site_url('petugas/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->
        <br>
 
    </body>
</html>