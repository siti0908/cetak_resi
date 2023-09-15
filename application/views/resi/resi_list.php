 </head>


    <body>
           <?php
$SqlPeriode ="";
$awalTgl="";
$akhirTgl="";
$tglAwal="";
$tglAkhir="";
if(isset($_POST['btnTampil'])) {
    $tglAwal = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-".date('m-Y');
    $tglAkhir = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
    $SqlPeriode = "where A.tanggal_transaksi BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
}
else {
    $awalTgl = "01-".date('m-Y');
    $akhirTgl = date('Y-m-d');

    $SqlPeriode = "where A.tanggal_transaksi BETWEEN '".$awalTgl."' AND '".$akhirTgl."'";
}
?>
             <h4>Periode Tanggal <b><?php echo ($tglAwal); ?></b> <b><?php echo ($tglAkhir); ?></b></h4>
        <!-- <div class="card shadow"> -->
            <div class="card ">
</div>
    <form action="<?php echo site_url('Resi/tampillaporan'); ?>" method="post" name="form10" target="_self">
    <div class="row">
        <div class="col-lg-3">
            <input name="txtTglAwal" type="date" class="form-control" value="<?php echo $awalTgl; ?>" size="10"/>
</div>
<div class="col-lg-3">
            <input name="txtTglAkhir" type="date" class="form-control" value="<?php echo $akhirTgl; ?>" size="10"/>
</div>
<div class="col-lg-3">
            <input name="Tampil" class="btn btn-success" type="submit" value="Tampilkan"/>
</div>
</form>
</div>

<br>

        <br>
       <!--  <h2 style="margin-top:0px">Kelola Data Barang</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
           <a target="_blank" href="<?= base_url('Resi/print'); ?> " class="btn btn-primary "><i class="fa fa-print"></i></a>
            </div>
            <div class="col-md-4 text-center">
               
            </div>
          
            <div class="col-md-4 text-right">
            <input type="number" id="rownumber">
            <button class="btn btn-primary " type="button" id="btn-rownumber" onclick="rownumber()">Cetak Resi</button>
            </div>
        </div>


                           <div class="card">
                              <div class="table-responsive"> -->
                              <!-- <div class="card-header">
                               <h3 class="card-title">DataTable with default features</h3>
                              </div> -->
                              <!-- /.card-header -->
                              <!-- <div class="card-body"> -->
                               <!--  <div class="row">
                                     <div class="col-6">
                                    </div>
                                    <div class="col-6 text-right">
                                    <input type="number" id="rownumber">
                                     <button class="btn btn-primary " type="button" id="btn-rownumber" onclick="rownumber()">Cetak Resi</button>
                                    </div> -->
                                <!-- </div> -->

                                <!-- <table id="example1" class="table table-bordered table-responsive"> -->
                                  <!-- <thead> -->




            <div class="card ">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary "> <b> Daftar List Resi </b></h5>
                  </div>
                  <div class="col-lg-6 col-xl-6" style="text-align: right;">
                     <input type="text" id="rownumber">
                <button class="btn btn-primary " type="button" id="btn-rownumber" onclick="rownumber()">Cetak Resi</button>
                 <!-- <a class="btn btn-primary shadow" href="<?php echo site_url('resi/create');?>"> -->
                      <!-- <span class="icon  ">
                        <i class="fas fa-user-plus mr-lg-2"></i>
                      </span>Tambah Data Resi </a><br> -->
                     <a target="_blank" href="<?= base_url('Resi/print'); ?> " class="btn btn-primary "><i class="fa fa-print"></i> Cetak</a>

                  </div>
                </div>
              </div>

        
             <div class="card-body table-responsive shadow">
                <table id="example3" class="shadow table table-bordered table-striped " >
                  <thead class="thead-dark">
                                    <tr>
                                        <!-- <th>Id Order</th> -->
                                        <th>No</th>
                                        <th>No Resi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nama Pengirim</th>
                                        <th>Alamat Pengirim</th>
                                        <th>Tlp Pengirim</th>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Penerima</th>
                                        <th>Tlp Penerima</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Kantor Asal</th>
                                        <th>Regional Asal</th>
                                        <th>Kantor Tujuan</th>
                                        <th>Regional Tujuan</th>
                                        <th>Berat Barang</th>
                                        <th>Bea Kirim</th>
                                        <th>Total Harga</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Petugas</th>
                                        <!-- <th>Nama Petugas</th> -->
                                        <th>Action</th>
                                        <th class="d-none">id Order</th>
                                    </tr>
                                </thead>
                          <!-- <td width="3px"><?php echo ++$start ?></td> -->
                                <tbody> 
                                    <?php $start = 0;
                                    foreach ($resi_data as $resi ) {
                                        echo "<tr>";
                                        // echo "<td class='text-center'><a href='" . generate_qrcode($resi->id_order) . "' target='_BLANK'><img id='gambarQrCode' src=" . generate_qrcode($resi->id_order) . " width='70px' /></a></td>";
                                        echo "<td>" . ++$start . "</td>";
                                        echo "<td>" . $resi->id_order . "</td>";
                                        echo "<td>" . $resi->tanggal_transaksi . "</td>";
                                        echo "<td>" . $resi->nama_pengirim . "</td>";
                                        echo "<td>" . $resi->alamat_pengirim . "</td>";
                                        echo "<td>" . $resi->tlp_pengirim . "</td>";
                                        echo "<td>" . $resi->nama_penerima . "</td>";
                                        echo "<td>" . $resi->alamat_penerima . "</td>";
                                        echo "<td>" . $resi->tlp_penerima . "</td>";
                                        echo "<td>" . $resi->nama_barang . "</td>";
                                        echo "<td>" . $resi->jenis_barang . "</td>";
                                        echo "<td>" . $resi->kantor_asal . "</td>";
                                        echo "<td>" . $resi->regional_asal . "</td>";
                                        echo "<td>" . $resi->kantor_tujuan . "</td>";
                                        echo "<td>" . $resi->regional_tujuan . "</td>";
                                        echo "<td>" . $resi->berat_barang . "</td>";
                                        echo "<td>" . $resi->bea_kirim . "</td>";
                                        echo "<td>" . $resi->total_harga . "</td>";
                                        echo "<td>" . $resi->jenis_pembayaran . "</td>";
                                        // echo "<td>" . $resi->id_petugas . "</td>";
                                        echo "<td>" . $resi->nama_lengkap . "</td>";
                                        echo "<td class='text-center'><a href='" . base_url('Resi/cetak_resi/') . $resi->id_order . "' class='btn btn-sm btn-primary' target='_blank'>Cetak Resi</a></td>";
                                        echo "<td class='d-none'>".$resi->id_order."</td>";
                                        echo "</tr>";
                                    }
                                    ?>

                         </tbody>
        </table>
    </div>
         </div>
  
<!-- <div class="row">
      <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('resi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

 -->





<script>
    var currentURL = "http://localhost/cetak_resi";
    $(document).ready(function() {
    
});
    function rownumber() {
  var rownumber = $("#rownumber").val();
  var redirectURL = currentURL + '/resi/cetak_all_resi/' + rownumber;
  window.open(redirectURL);
}
    function cetak_resi(){
var table = $('#example1').DataTable();

// Mengambil data dari DataTable menjadi array
var dataArray = table.rows().data().toArray();

// Mengirim data menggunakan AJAX
$.ajax({
  url: `${currentURL}/resi/cetak_all_resi`, // URL endpoint
  method: 'POST',
  data: {
    dataArray: dataArray // Data yang akan dikirim sebagai parameter POST
  },
  success: function(response) {
    // Tindakan setelah permintaan berhasil
    console.log('Permintaan sukses');
    console.log(response);
  },
  error: function(xhr, status, error) {
    // Tindakan jika terjadi kesalahan
    console.log('Kesalahan dalam permintaan');
    console.log(xhr.responseText);
  }
});
            }

</script>


</body>

</html>