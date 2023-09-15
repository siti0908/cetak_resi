<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		$data['page'] = 'dashboard_view';
		$data['jml_petugas']=$this->db->query("SELECT * from Petugas")->num_rows();
		$data['jml_kantor']=$this->db->query("SELECT * from Kantor")->num_rows();
		$data['jml_pickup']=$this->db->query("SELECT * from Data_pickup")->num_rows();
		$data['jml_resi']=$this->db->query("SELECT * from Resi")->num_rows();
		$data['data_pickup_data'] = $this->db->query("SELECT * FROM Data_pickup LIMIT 5")->result();

		$this->load->view('template',$data );
	}
}
