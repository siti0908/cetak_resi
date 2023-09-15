<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MData_pickup extends CI_Model
{

    public $table = 'data_pickup';
    public $id = 'id_pickup';
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
    function total_rows($q = NULL) {
        $this->db->like('id_pickup', $q);
	$this->db->or_like('tanggal_transaksi', $q);
	$this->db->or_like('nama_pengirim', $q);
	$this->db->or_like('alamat_pengirim', $q);
	$this->db->or_like('tlp_pengirim', $q);
	$this->db->or_like('nama_penerima', $q);
	$this->db->or_like('alamat_penerima', $q);
	$this->db->or_like('tlp_penerima', $q);
    $this->db->or_like('nama_barang', $q);
    $this->db->or_like('jenis_barang', $q);
    $this->db->or_like('kantor_asal', $q);
    $this->db->or_like('regional_asal', $q);
    $this->db->or_like('kantor_tujuan', $q);
	$this->db->or_like('regional_tujuan', $q);
	$this->db->or_like('berat_barang', $q);
	$this->db->or_like('bea_kirim', $q);
	$this->db->or_like('total_harga', $q);
    $this->db->or_like('jenis_pembayaran', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pickup', $q);
	$this->db->or_like('tanggal_transaksi', $q);
	$this->db->or_like('nama_pengirim', $q);
	$this->db->or_like('alamat_pengirim', $q);
	$this->db->or_like('tlp_pengirim', $q);
	$this->db->or_like('nama_penerima', $q);
	$this->db->or_like('alamat_penerima', $q);
	$this->db->or_like('tlp_penerima', $q);
    $this->db->or_like('nama_barang', $q);
	$this->db->or_like('jenis_barang', $q);
	$this->db->or_like('kantor_asal', $q);
    $this->db->or_like('regional_asal', $q);
    $this->db->or_like('kantor_tujuan', $q);
    $this->db->or_like('regional_tujuan', $q);
    $this->db->or_like('berat_barang', $q);
	$this->db->or_like('bea_kirim', $q);
	$this->db->or_like('total_harga', $q);
    $this->db->or_like('jenis_pembayaran', $q);
	$this->db->or_like('status', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    Public function cekStatus($dp)
{
    $query = $this->db->get_where($this->table,array('id_pickup'=>$dp, 'status'=>'approve'));
    if($query->num_rows() > 0) {
        return true;
    }
    else {
    return false;
    }
}

function CheckApprove()
    {
        $this->db->where('status','belum diapprove');
        return $this->db->get($this->table)->result();
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

/* End of file MData_pickup.php */
/* Location: ./application/models/MData_pickup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-30 14:49:37 */
/* http://harviacode.com */