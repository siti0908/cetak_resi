
    <body><br>
         <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Data Petugas</h3>
              </div>
              <!-- /.card-header --> 
                <div class="card-body">
                <form  action="<?php echo $action; ?>" method="post">
               <div class="row">

                    <div class="col-sm-6">
                  <div class="form-group ">
                    <label for="varchar" >Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                      <!-- <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" /> -->
                        <input onkeypress="return isNumericKey(event)" maxlength="100" class="form-control"  placeholder="Nama Lengkap" type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>" required>
                    </div>
                </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                    <label for="email" >Email <?php echo form_error('email') ?></label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                    </div>
                  </div>
              </div>

                   <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group ">
                     <label for="int" >Nipos <?php echo form_error('nipos') ?></label>
                   <!-- <input type="text" class="form-control"  name="nipos" id="nipos" placeholder="Nipos" value="<?php echo $nipos; ?>" />  -->
                      <input onkeypress="return isNumberKey(event)" maxlength="9" class="form-control"  placeholder="Nipos" type="text" name="nipos" id="nipos" value="<?php echo $nipos; ?>" required>

                    </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group ">
                    <label for="varchar">No Telpon <?php echo form_error('no_telp') ?></label>
                   <!-- <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" /> -->
                    <input onkeypress="return isNumberKey(event)" maxlength="12" class="form-control"  placeholder="No Telpon" type="text" name="no_telp" id="no_telp" value="<?php echo $no_telp; ?>" required>
                   
                    </div>
                    </div>
                  </div>
             
                  
                  <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group ">
                   <label for="enum">Status Pegawai <?php echo form_error('status_pegawai') ?></label>
                    <select class="form-control" id="status_pegawai" name="status_pegawai"  placeholder="Status Pegawai" >
                    <option value = #> Pilih Status</option>
                    <option value = "Aktif" id="status_pegawai" name="status_pegawai" placeholder="Status Pegawai"  > Aktif</option>
                    <option value = "Tidak Aktif" id="status_pegawai" name="status_pegawai" placeholder="Status Pegawai"  > Tidak Aktif</option>    
                </select>
                </div>
            </div>
                  <div class="col-sm-6">
                   <div class="form-group">
                    <label for="varchar" >Alamat <?php echo form_error('alamat') ?></label>
                   <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                    </div>
                  </div>
                </div>

                   <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group ">
                     <label for="varchar">Username <?php echo form_error('username') ?></label>
                   <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group ">
                  <label for="varchar" >Password <?php echo form_error('password') ?></label>
                   <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                    </div>
                  </div>
              </div>

                <div class="row">
                <div class="col-sm-6">
                  <div class="form-group ">
                    <label for="enum" >Hak Akses <?php echo form_error('hak_akses') ?></label>
                <select class="form-control"id="hak_akses" name="hak_akses" placeholder="Hak Akses" >
                <option value = #> Pilih Hak Akses</option>
                <option value = "Admin" id="hak_akses" name="hak_akses" placeholder="Hak Akses"  > Admin</option>
                <option value = "Petugas Loket" id="hak_akses" name="hak_akses" placeholder="Hak Akses"  > Petugas Loket</option>
                <option value = "Customer" id="hak_akses" name="hak_akses"  placeholder="Hak Akses" > Customer </option>              
                </select>
                    </div>
                  </div>
                <div class="col-sm-6">
                <div class="form-group ">
               <label for="int" >Nama Kantor <?php echo form_error('id_kantor') ?></label>
                   <select name="id_kantor" class="form-control"readonly="readonly">
                    <option value="" >Nama Kantor </option>
                        <?php if ($list_kantor):?>
                        <?php foreach ($list_kantor as $lk):?>
                        <option value="<?php echo $lk->id_kantor?>" <?php if($lk->id_kantor==$id_kantor){echo "selected";}?>><?php echo $lk->nama_kota?></option>
                            <?php endforeach?>
                        <?php endif?>
                    </select>
                    </div>
                  </div>
                </div>



            
        <input type="hidden" name="id_petugas" value="<?php echo $id_petugas; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('petugas') ?>" class="btn btn-danger">Cancel</a>
 </div>
     
     </div>
     </form>
 </div>
 <script>
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return false;
    return true;
  }


  function isNumericKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return true;
    return false;
  }
</script>
    </body>
</html>
 

<!-- 
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nipos <?php echo form_error('nipos') ?></label>
            <input type="text" class="form-control" name="nipos" id="nipos" placeholder="Nipos" value="<?php echo $nipos; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nopend <?php echo form_error('nopend') ?></label>
            <input type="text" class="form-control" name="nopend" id="nopend" placeholder="Nopend" value="<?php echo $nopend; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">No Telp <?php echo form_error('no_telp') ?></label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Status Pegawai <?php echo form_error('status_pegawai') ?></label>
            <input type="text" class="form-control" name="status_pegawai" id="status_pegawai" placeholder="Status Pegawai" value="<?php echo $status_pegawai; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Hak Akses <?php echo form_error('hak_akses') ?></label>
            <input type="text" class="form-control" name="hak_akses" id="hak_akses" placeholder="Hak Akses" value="<?php echo $hak_akses; ?>" />
        </div> -->
      