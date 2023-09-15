
    </head>
    <body>
        <br>
          
 
          <div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary "> <b> Daftar List User </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                  <a class="btn btn-primary shadow" href="<?php echo site_url('user/create');?>">
                      <span class="icon  ">
                        <i class="fas fa-user-plus mr-lg-2"></i>
                      </span>Tambah Data User </a>
                    <!-- <?php echo anchor(site_url('user/create'),' <i class="fa fa-user-plus"> </i>  ', 'class="btn btn-primary"'); ?>
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
                            foreach ($user_data as $user)
                            {
                                ?>
                                                    <tr>
                          <td width="3px"><?php echo ++$start ?></td>
                          <td ><?php echo $user->nama_lengkap ?></td>
                          <td ><?php echo $user->email ?></td>
                          <td ><?php echo $user->nipos ?></td>
                          <td ><?php echo $user->no_telp ?></td>
                          <td ><?php echo $user->status_pegawai ?></td>
                          <td ><?php echo $user->alamat ?></td>
                          <td ><?php echo $user->username ?></td>
                          <td ><?php echo $user->password ?></td>
                          <td ><?php echo $user->hak_akses ?></td>
                          <td ><?php echo $user->nama_kantor ?></td>
                          <td style="text-align:center" width="20px">
                            <?php 
                            echo anchor(site_url('user/read/'.$user->id_user),'<i class="fa fa-info-circle " style="color: #db0a0a;" ></i>'); 
                            echo ' | '; 
                            echo anchor(site_url('user/update/'.$user->id_user),' <i class="fa fa-edit"></i>'); 
                            // echo ' | '; 
                            // echo anchor(site_url('user/delete/'.$user->id_user),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
    <?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <br>
 
    </body>
</html>