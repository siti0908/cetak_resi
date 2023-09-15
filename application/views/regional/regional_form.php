
    </head>
    <body><br>
         <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Data Regional</h3>
              </div>
              <!-- /.card-header --> 
                <div class="card-body">
                <form  action="<?php echo $action; ?>" method="post">
              
   
	    <div class="form-group">
            <label for="varchar">Regional <?php echo form_error('regional') ?></label>
            <input type="text" class="form-control" name="regional" id="regional" placeholder="Regional" value="<?php echo $regional; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kota <?php echo form_error('nama_kota') ?></label>
            <!-- <input type="text" class="form-control" name="nama_kota" id="nama_kota" placeholder="Nama Kota" value="<?php echo $nama_kota; ?>" /> -->
            <input onkeypress="return isNumericKey(event)" maxlength="50" class="form-control"  placeholder="Nama Kota" type="text" name="nama_kota" id="nama_kota" value="<?php echo $nama_kota; ?>" required>
        </div>
         <div class="form-group">
            <label for="varchar">Cabang Regional <?php echo form_error('cabang_regional') ?></label>
            <input type="text" class="form-control" name="cabang_regional" id="cabang_regional" placeholder="Cabang Regional" value="<?php echo $cabang_regional; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nopend <?php echo form_error('nopend') ?></label>
            <!-- <input type="text" class="form-control" name="nopend" id="nopend" placeholder="Nopend" value="<?php echo $nopend; ?>" /> -->

            <input onkeypress="return isNumberKey(event)" maxlength="9" class="form-control"  placeholder="Nopend" type="text" name="nopend" id="nopend" value="<?php echo $nopend; ?>" required>

        </div>

         <div class="form-group ">
                    <label for="enum">Tipe Kantor <?php echo form_error('tipe_kantor') ?></label>
                    <select class="form-control" name="tipe_kantor" id="tipe_kantor" placeholder="Tipe Kantor" >
                    <option value = #> Pilih Tipe Kantor</option>
                    <option value = "Kantor Cabang" name="tipe_kantor" id="tipe_kantor" placeholder="Tipe Kantor"  > Kantor Cabang</option>
                    <option value = "Pusat" name="tipe_kantor" id="tipe_kantor" placeholder="Tipe Kantor"  > Pusat </option>    
                    </select>
                    </div>
	    <input type="hidden" name="id_regional" value="<?php echo $id_regional; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('regional') ?>" class="btn btn-danger">Cancel</a>
	</form>


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