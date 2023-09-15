<?php

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    function __construct()
    {
        // construct parent
        parent::__construct();
        $this->load->model('MApi');
    }

    public function index_get()
    {

        // jika ada parameter id 
        $list_api = $this->MApi->get_all();
        if ($list_api) {
            $total_api = count($list_api);
            $this->response(
                array(
                    'status' => true,
                    'tanggal_transaksi' => $tanggal_transaksi,
                    'nama_pengirim,' => $nama_pengirim,
                    'alamat_pengirim,' => $alamat_pengirim,
                    'tlp_pengirim,' => $tlp_pengirim,
                    'nama_penerima,' => $nama_penerima,
                    'alamat_penerima,' => $alamat_penerima,
                    'tlp_penerima,' => $tlp_penerima,
                    'nama_barang,' => $nama_barang,
                    'jenis_barang,' => $jenis_barang,
                    'berat,' => $berat,
                    'total_harga,' => $total_harga,
                    'jenis_pembayaran,' => $jenis_pembayaran
                ),
                200
            );
        } else {
            $this->response(
                array(
                    'status' => false,
                    'message' => 'Tidak Ada Data Buku'
                ),
                404
            );
        }
    }

    public function by_id_get()
    {
        // jika ada parameter id
        $id_pickup = $this->get('id_pickup');
        if ($id_pickup) {
            $data_api = $this->MApi->get_by_id($id);
            if ($data_api) {
                $this->response(
                    array(
                        'status' => true,
                         'tanggal_transaksi' => $tanggal_transaksi,
                        'nama_pengirim,' => $nama_pengirim,
                        'alamat_pengirim,' => $alamat_pengirim,
                        'tlp_pengirim,' => $tlp_pengirim,
                        'nama_penerima,' => $nama_penerima,
                        'alamat_penerima,' => $alamat_penerima,
                        'tlp_penerima,' => $tlp_penerima,
                        'nama_barang,' => $nama_barang,
                        'jenis_barang,' => $jenis_barang,
                        'berat,' => $berat,
                        'total_harga,' => $total_harga,
                        'jenis_pembayaran,' => $jenis_pembayaran
                        
                    ),
                    200
                );
            } else {
                $this->response(
                    array(
                        'status' => false,
                        'pesan' => 'ID ' . $id . ' Tidak Ditemukan'
                    ),
                    404
                );
            }
        } else {
            $this->response(
                array(
                    'status' => false,
                    'pesan' => 'Silahkan Masukkan Parameter Id'
                ),
                404
            );
        }
    }

    public function index_post()
    {
        
        $tanggal_transaksi = $this->post('tanggal_transaksi');
        $nama_pengirim = $this->post('nama_pengirim');
        $alamat_pengirim = $this->post('alamat_pengirim');
        $tlp_pengirim = $this->post('tlp_pengirim');
        $nama_penerima = $this->post('nama_penerima');
        $alamat_penerima = $this->post('alamat_penerima');
        $tlp_penerima = $this->post('tlp_penerima');
        $nama_barang = $this->post('nama_barang');
        $jenis_pembayaran = $this->post('jenis_pembayaran');
        $berat = $this->post('berat');
        $total_harga = $this->post('total_harga');
        $jenis_pembayaran = $this->post('jenis_pembayaran');

        

        $data_api = array(
            'tanggal_transaksi' => $tanggal_transaksi,
                    'nama_pengirim,' => $nama_pengirim,
                    'alamat_pengirim,' => $alamat_pengirim,
                    'tlp_pengirim,' => $tlp_pengirim,
                    'nama_penerima,' => $nama_penerima,
                    'alamat_penerima,' => $alamat_penerima,
                    'tlp_penerima,' => $tlp_penerima,
                    'nama_barang,' => $nama_barang,
                    'jenis_barang,' => $jenis_barang,
                    'berat,' => $berat,
                    'total_harga,' => $total_harga,
                    'jenis_pembayaran,' => $jenis_pembayaran
        );

        $this->MApi->insert($data_api);
        $this->response(
            array(
                'status' => true,
                'pesan' => 'Data Berhasil Disimpan'
            ),
            200
        );
    }

    public function index_put()
    {
         $tanggal_transaksi = $this->put('tanggal_transaksi');
        $nama_pengirim = $this->put('nama_pengirim');
        $alamat_pengirim = $this->put('alamat_pengirim');
        $tlp_pengirim = $this->put('tlp_pengirim');
        $nama_penerima = $this->put('nama_penerima');
        $alamat_penerima = $this->put('alamat_penerima');
        $tlp_penerima = $this->put('tlp_penerima');
        $nama_barang = $this->put('nama_barang');
        $jenis_pembayaran = $this->put('jenis_pembayaran');
        $berat = $this->put('berat');
        $total_harga = $this->put('total_harga');
        $jenis_pembayaran = $this->put('jenis_pembayaran');
        $data_hp = array(
             'tanggal_transaksi' => $tanggal_transaksi,
                    'nama_pengirim,' => $nama_pengirim,
                    'alamat_pengirim,' => $alamat_pengirim,
                    'tlp_pengirim,' => $tlp_pengirim,
                    'nama_penerima,' => $nama_penerima,
                    'alamat_penerima,' => $alamat_penerima,
                    'tlp_penerima,' => $tlp_penerima,
                    'nama_barang,' => $nama_barang,
                    'jenis_barang,' => $jenis_barang,
                    'berat,' => $berat,
                    'total_harga,' => $total_harga,
                    'jenis_pembayaran,' => $jenis_pembayaran
        );

        $this->MApi->update($id_pickup, $data_api);
        $this->response(
            array(
                'status' => true,
                'pesan' => 'Data Handphone Berhasil Diubah',
                'id' => $id
            ),
            200
        );
    }

    public function index_delete()
    {
        $id_pickup = $this->delete('id_pickup');
        $this->MApi->delete($id_pickup);
        $this->response(
            array(
                'Status' => true,
                'Pesan' => 'Data Pickup Berhasil Dihapus'
            ),
            200
        );
    }
}