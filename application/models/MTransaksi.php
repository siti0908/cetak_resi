<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MTransaksi extends CI_Model
{

    public $table = 'transaksi';
    public $id = 'id_transaksi';
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
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('tgl_transaksi', $q);
	$this->db->or_like('id_pengirim', $q);
	$this->db->or_like('alamat_pengirim', $q);
	$this->db->or_like('no_tlp_pengirim', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('berat', $q);
	$this->db->or_like('id_penerima', $q);
	$this->db->or_like('alamat_penerima', $q);
	$this->db->or_like('no_tlp_penerima', $q);
	$this->db->or_like('harga', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
	// $this->db->or_like('tgl_transaksi', $q);
	$this->db->or_like('id_pengirim', $q);
	$this->db->or_like('alamat_pengirim', $q);
	$this->db->or_like('no_tlp_pengirim', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('berat', $q);
	$this->db->or_like('id_penerima', $q);
	$this->db->or_like('alamat_penerima', $q);
	$this->db->or_like('no_tlp_penerima', $q);
	$this->db->or_like('harga', $q);
	$this->db->limit($limit, $start);
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

/* End of file MTransaksi.php */
/* Location: ./application/models/MTransaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-16 04:56:03 */
/* http://harviacode.com */