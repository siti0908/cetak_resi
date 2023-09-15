<?php 
class MHp extends CI_Model
{
    public $table = 'data_pickup';
    public $id ='id_pickup';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    //get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    

    //get data by id
    function get_by_id($id_pickup)
    {
        $this->db->where($this->id_pickup, $id_pickup);
        return $this->db->get($this->table)->row();
    }

    //get total rows
    function total_rows()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    //insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    //update data
    function update($id_pickup, $data)
    {
        $this->db->where($this->id_pickup, $id_pickup);
        $this->db->update($this->table, $data);
    }

    //delete data
    function delete($id_pickup)
    {
        $this->db->where($this->id_pickup, $id_pickup);
        $this->db->delete($this->table);
    }

    
}