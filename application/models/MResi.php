<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MResi extends CI_Model
{

    public $table = 'resi';
    public $id = 'kode_resi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL, $param=NULL) {
        //join tabel Petugas
    $this->db->select('r.*,p.nama_lengkap');
    $this->db->from('resi r');
    $this->db->join('petugas p', 'p.id_petugas = r.id_petugas');


    if($param !=NULL){
    $this->db->where_in('id_order',$param);
    }
        $this->db->order_by('r.kode_resi', $this->order);
        $this->db->like('r.kode_resi', $q);
   
        return $this->db->count_all_results();
    }



    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $param= NULL) {

  //join tabel Petugas
    $this->db->select('r.*,p.nama_lengkap');
    $this->db->from('resi r');
    $this->db->join('petugas p', 'p.id_petugas = r.id_petugas');


    if($param !=NULL){
    $this->db->where_in('id_order',$param);
    }
        $this->db->order_by('r.kode_resi', $this->order);
        $this->db->like('r.kode_resi', $q);

if($limit!==100){
    $this->db->limit($limit, $start);}
        return $this->db->get()->result();
    }

public function get_laporan_by_date($awal, $akhir)
{
    $this->db->select('r.*, p.nama_lengkap');
    $this->db->from('resi r');
    $this->db->join('petugas p', 'p.id_petugas = r.id_petugas');
    $this->db->where('tanggal_transaksi >=', $awal);
    $this->db->where('tanggal_transaksi <=', $akhir);
    $this->db->order_by('r.kode_resi', 'DESC');
    return $this->db->get()->result();
}


// public function get_laporan_by_date($awal, $akhir)
// {
   
    
//     $this->db->where('tanggal_transaksi >=', $awal);
//     $this->db->where('tanggal_transaksi <=', $akhir);
//     $this->db->order_by('kode_resi', 'DESC');
//     return $this->db->get('resi')->result();
// }

    //   function get_laporan_by_date( $awal = NULL , $akhir = NULL) {
    //     $this->db->order_by('kode_resi', 'DESC');
    //     $this->db->where('tanggal_transaksi >=', $awal);
    //     $this->db->where('tanggal_transaksi <=', $akhir);
    //    // return $this->db->get($this->table)->result();
    //    $this->db->get('resi')->result();
    //    // echo $this->db->last_query(); exit;
    // }

function periode($periode)
    {
        $SqlPeriode ="";
        $awalTgl="";
        $akhirTgl="";
        $tglAwal="";
        $tglAkhir="";
        if(isset($_POST['btnTampil'])) {
        $tglAwal = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-".date('m-Y');
        $tglAkhir = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
        $SqlPeriode = "where R.tanggal_transaksi BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
        }
        else {
        $awalTgl = "01-".date('m-Y');
        $akhirTgl = date('d-m-Y');

        $SqlPeriode = "where R.tanggal_transaksi BETWEEN '".$awalTgl."' AND '".$akhirTgl."'";
}
}

    function panggilperiode($panggil)
    {
    $Sql = "Select * from resi,  $SqlPeriode";
    $myQry = mysqli_query($mysqli, $Sql) or die 
    ("Query salah : ".mysqli_error());
    $id= 1;
    while ($resi = mysqli_fetch_array($myQry)){
        
    }
}

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file MData_barang.php */
/* Location: ./application/models/MData_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-09 04:05:33 */
/* http://harviacode.com */