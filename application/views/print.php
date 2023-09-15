<!DOCTYPE html>
<html>

<head>
  <title>Contoh DataTables</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

</head>

<body>

  <div class="container mt-4">

    <h2>Data Project</h2>

    <table id="example" class="table table-striped table-bordered" style="width:100%;">
      <thead>
        <tr>
        
         <th>Id Order</th>
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
      <th>Berat Barang</th>
      <th>Bea Kirim</th>
      <th>Total Harga</th>
      <th>Petugas</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach ($resi_data as $resi){
               echo "<tr>";
                    echo "<td class='text-center'><a href='" . generate_qrcode($resi->id_order) . "' target='_BLANK'><img id='gambarQrCode' src=" . generate_qrcode($resi->id_order) . " width='70px' /></a></td>";
                    echo "<td>" .  $resi->tanggal_transaksi . "</td>";
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
                    echo "<td>" . $resi->tanggal_transaksi .  "</td>";
                    echo "<td>" . $resi->id_petugas . "</td>";
                    echo "</tr>";
                }
                ?> 

       <!--  <?php
        // Looping data mahasiswa
        foreach ($project as $value) {
          echo "<tr>";
          echo "<td class='text-center'><a href='" . generate_qrcode($value['id']) . "' target='_BLANK'><img id='gambarQrCode' src=" . generate_qrcode($value['id']) . " width='70px' /></a></td>";
          echo "<td>" . $value['project_code'] . "</td>";
          echo "<td>" . $value['name'] . "</td>";
          echo "<td>" . $value['client_name'] . "</td>";
          echo "</tr>";
        }
        ?> -->
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      window.print();
    })
  </script>
</body>

</html>