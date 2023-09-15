
    <body>
        <br>

 <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Data Kantor</h3>
              </div>
              <!-- /.card-header --> 
                <div class="card-body">
               <form action="<?php echo $action; ?>" method="post">

 <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group ">

                     <label for="varchar" >Cabang Regional<?php echo form_error('cabang_regional') ?></label>
                          <select id="cabang_regional" onchange="get_jenis()" name="cabang_regional" class="form-control">
                        <option value="" >Cabang Regional </option>
                            <?php if ($list_regional):?>
                                <?php foreach ($list_regional as $lj):?>
                                    <option value="<?php echo $lj->cabang_regional?>">
                                    <?php echo $lj->cabang_regional?></option>
                                <?php endforeach?>
                            <?php endif?>
                        </select>
                  

                    <!--  <select name="regional" class="form-control">
                    <option value="" >Nama Kantor </option>
                        <?php if ($list_regional):?>
                        <?php foreach ($list_regional as $lrg):?>
                        <option value="<?php echo $lrg->regional?>" <?php if($lrg->regional==$regional){echo "selected";}?>><?php echo $lrg->regional?></option>
                            <?php endforeach?>
                        <?php endif?>
                    </select> -->
                    </div>
                  </div>
                   <div class="col-sm-6">
                  <div class="form-group ">
                   <label for="enum">Tipe Kantor <?php echo form_error('tipe_kantor') ?></label>
                <input type="text" class="form-control" name="tipe_kantor" id="tipe_kantor" readonly/>
                    <input type="hidden" class="form-control" name="tipe_kantor_hidden" id="tipe_kantor_hidden"/>

                    <!-- <select name="tipe_kantor" class="form-control">
                    <option value="" >Tipe Kantor </option>
                        <?php if ($list_regional):?>
                        <?php foreach ($list_regional as $lrg):?>
                        <option value="<?php echo $lrg->tipe_kantor?>" <?php if($lrg->tipe_kantor==$tipe_kantor){echo "selected";}?>><?php echo $lrg->tipe_kantor?></option>
                            <?php endforeach?>
                        <?php endif?>
                    </select> -->
                  </div>
              </div>
              </div>

               <div class="row">

                    <div class="col-sm-6">
                  <div class="form-group ">
                    <label for="varchar">Nama kota <?php echo form_error('nama_kota') ?></label>
                      <!--  <select name="nama_kota" class="form-control">
                    <option value="" >Nama Kota </option>
                        <?php if ($list_regional):?>
                        <?php foreach ($list_regional as $lrg):?>
                        <option value="<?php echo $lrg->nama_kota?>" <?php if($lrg->nama_kota==$nama_kota){echo "selected";}?>><?php echo $lrg->nama_kota?></option>
                            <?php endforeach?>
                        <?php endif?>
                    </select> -->

                     <input type="text" class="form-control" name="nama_kota" id="nama_kota" readonly/>
                    <input type="hidden" class="form-control" name="nama_kota_hidden" id="nama_kota_hidden"/>
                    </div>
                </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="enum">Regional <?php echo form_error('regional') ?></label>

              <input type="text" class="form-control" name="regional" id="regional" readonly/>
                    <input type="hidden" class="form-control" name="regional_hidden" id="regional_hidden"/>
                   <!--  <label for="varchar" >Cabang Regional<?php echo form_error('cabang_regional') ?></label>
                          <select id="cabang_regional" onchange="get_jenis()" name="cabang_regional" class="form-control">
                        <option value="" >Cabang Regional </option>
                            <?php if ($list_regional):?>
                                <?php foreach ($list_regional as $lj):?>
                                    <option value="<?php echo $lj->cabang_regional?>">
                                    <?php echo $lj->cabang_regional?></option>
                                <?php endforeach?>
                            <?php endif?>
                        </select> -->
                    </div>
                  </div>
              </div>

                   <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group ">
                      <label for="varchar" >Alamat Kantor<?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group ">
                    <label for="int" >Kode Pos <?php echo form_error('kode_pos') ?></label>
                   <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
                    </div>
                  </div>
              </div>


               <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group ">
                    <label for="varchar">Phone <?php echo form_error('phone') ?></label>
                       <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                    </div>
                    </div>
             
                 <!--  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="int">Nopend Kcu <?php echo form_error('nopend_kcu') ?></label>
                  <input type="text" class="form-control" name="nopend_kcu" id="nopend_kcu" placeholder="Nopen Kcu" value="<?php echo $nopend_kcu; ?>" />
                    </div>
                  </div>
                </div>

                  <div class="row">
                  <div class="col-sm-6">
                  <div class="form-group ">
                   <label for="int">Nopend Kprk<?php echo form_error('nopend_krk') ?></label>
                  <input type="text" class="form-control" name="nopend_kprk" id="nopend_kprk" placeholder="Nopend Kprk" value="<?php echo $nopend_kprk; ?>" />
                    </div>
                </div> -->
                  <div class="col-sm-6">
                   <div class="form-group">
                    <label for="int">Nopend<?php echo form_error('nopend') ?></label>
                  <!--  <select name="nopend" class="form-control">
                    <option value="" >Nopend </option>
                        <?php if ($list_regional):?>
                        <?php foreach ($list_regional as $lrg):?>
                        <option value="<?php echo $lrg->nopend?>" <?php if($lrg->nopend==$nopend){echo "selected";}?>><?php echo $lrg->nopend?></option>
                            <?php endforeach?>
                        <?php endif?>
                    </select> -->

                     <input type="text" class="form-control" name="nopend" id="nopend" readonly/>
                    <input type="hidden" class="form-control" name="nopend_hidden" id="nopend_hidden"/>

                    </div>
                  </div>
                </div>

                  

 
             

        <input type="hidden" name="id_kantor" value="<?php echo $id_kantor; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>   
        <a href="  <?php echo site_url('kantor') ?>" class="btn btn-danger">Cancel</a>
    </form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function get_jenis() {
    var cabang_regional = $('#cabang_regional').val();

    var formdata = new FormData();
    formdata.append('cabang_regional', cabang_regional);

    
    $.ajax({
        type: 'POST',
        url: "<?= base_url('kantor/get_regional'); ?>",
        data: formdata,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
          
            $('#regional_hidden').val(response.regional_hidden);
            $('#regional').val(response.regional);
            $('#nopend_hidden').val(response.nopend_hidden);
            $('#nopend').val(response.nopend);
            $('#tipe_kantor_hidden').val(response.tipe_kantor_hidden);
            $('#tipe_kantor').val(response.tipe_kantor);
            $('#nama_kota_hidden').val(response.nama_kota_hidden);
            $('#nama_kota').val(response.nama_kota);

            
        },
    });
   
}

</script>
    </body>
</html>
             







       <!--  <h2 style="margin-top:0px">Kantor <?php echo $button ?></h2>
        
        <div class="form-group">
            <label for="varchar">Nama Kantor <?php echo form_error('nama_kantor') ?></label>
            <input type="text" class="form-control" name="nama_kantor" id="nama_kantor" placeholder="Nama Kantor" value="<?php echo $nama_kantor; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Kode Pos <?php echo form_error('kode_pos') ?></label>
            <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nopen Kcu <?php echo form_error('nopen_kcu') ?></label>
            <input type="text" class="form-control" name="nopen_kcu" id="nopen_kcu" placeholder="Nopen Kcu" value="<?php echo $nopen_kcu; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Regional <?php echo form_error('regional') ?></label>
            <input type="text" class="form-control" name="regional" id="regional" placeholder="Regional" value="<?php echo $regional; ?>" />
        </div>
        <div class="form-group">
            <label for="enum">Tipe Kantor <?php echo form_error('tipe_kantor') ?></label>
            <input type="text" class="form-control" name="tipe_kantor" id="tipe_kantor" placeholder="Tipe Kantor" value="<?php echo $tipe_kantor; ?>" />
        </div> -->
    