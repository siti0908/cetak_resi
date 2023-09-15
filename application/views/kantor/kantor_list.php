<html>
    <head>

    </head>
    <body>
        
        <br>
         
        <!-- <h2 style="margin-top:0px">Kantor List</h2> -->
     
        <!-- <div class="row" style="margin-bottom: 10px"> -->

            <!-- <div class="col-md-4">
                <?php echo anchor(site_url('kantor/create'),'<i class="fa fa-plus"></i>   Create Data Kantor', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kantor/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kantor'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div> -->

<div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary "> <b> Daftar List Kantor </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                  <a class="btn btn-primary shadow" href="<?php echo site_url('kantor/create');?>">
                      <span class="icon  ">
                        <i class="fas fa-user-plus mr-lg-2"></i>
                      </span>Tambah Data Kantor </a>
                    <!-- <?php echo anchor(site_url('user/create'),' <i class="fa fa-user-plus"> </i>  ', 'class="btn btn-primary"'); ?>
                      </span>Tambah Data User </a> -->
                  </div>
                </div>
              </div>

        
              <div class="card-body shadow">
                <table id="example3" class="shadow table table-bordered table-striped " >
                  <thead class="thead-dark">
            <tr>
                <th>No</th>
        <th>Nama Kota</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
        <th>Phone</th>
        <th>Nopend</th>
        <!-- <th>Nopend Kcu</th>
        <th>Nopend Kprk</th> -->
        <th>Regional</th>
        <th>Tipe Kantor</th>
        <th><center>Action</center></th>
            </tr>
          </thead>
<tbody>
  <?php
            foreach ($kantor_data as $kantor)
            {
                ?>
                <tr>
            <td width="5px"><?php echo ++$start ?></td>
            <td><?php echo $kantor->nama_kota ?></td>
            <td><?php echo $kantor->alamat ?></td>
            <td><?php echo $kantor->kode_pos ?></td>
            <td><?php echo $kantor->phone ?></td>
            <td><?php echo $kantor->nopend ?></td>
           <!--  <td><?php echo $kantor->nopend_kcu ?></td>
            <td><?php echo $kantor->nopend_kprk ?></td> -->
            <td><?php echo $kantor->regional ?></td>
            <td><?php echo $kantor->tipe_kantor ?></td>
            <td style="text-align:center" width="50px">
                <?php 
                echo anchor(site_url('kantor/read/'.$kantor->id_kantor),'<div class="btn btn-primary btn-sm" title="Lihat Selengkapnya"><i class="fa fa-search-plus" ></i></div>'); 
                echo ' | '; 
                echo anchor(site_url('kantor/update/'.$kantor->id_kantor),'<i class="fa fa-edit"></i>'); 
                // echo ' | '; 
                // echo anchor(site_url('kantor/delete/'.$kantor->id_kantor),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                // ?>
            </td>
        </tr>
        <i class="fa-solid fa-pen-to-square" style="color: #d60000;"></i>
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
        <?php echo anchor(site_url('kantor/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

    </body>
</html>