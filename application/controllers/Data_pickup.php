<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_pickup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MData_pickup');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_pickup/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_pickup/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_pickup/index.html';
            $config['first_url'] = base_url() . 'data_pickup/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MData_pickup->total_rows($q);
        $data_pickup = $this->MData_pickup->get_limit_data($config['per_page'], $start, $q);
         $data_pickup = $this->db->query("SELECT * FROM data_pickup order by id_pickup DESC")->result();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_pickup_data' => $data_pickup,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('data_pickup/data_pickup_list', $data);
        $data['page'] = 'data_pickup/data_pickup_list';
		$this->load->view('template',$data );
    }


public function approve($id = NULL)
  {

    $this->db->query("update data_pickup set status = 'approve' ");
    $temporary = $this->db->query("SELECT * from Data_pickup ")->result();
    
    $result = [];
    foreach ($temporary as $data) {
      $temp = [];
      $id_order = $this->generateResi ($data->id_pickup, $data->tanggal_transaksi);
      $idOrderDataResi = $this->db->query("SELECT id_order from resi where id_order='$id_order'")->num_rows();

        // cek apakah ada id_order yg sama?, jika tidak maka insert
        if($idOrderDataResi<1){
            $temp['id_order'] = $id_order ;
            // $temp['id_pickup'] = $data->id_pickup;
            $temp['tanggal_transaksi'] = $data->tanggal_transaksi;
            $temp['nama_pengirim'] = $data->nama_pengirim;
            $temp['alamat_pengirim'] = $data->alamat_pengirim;
            $temp['tlp_pengirim'] = $data->tlp_pengirim;
            $temp['nama_penerima'] = $data->nama_penerima;
            $temp['alamat_penerima'] = $data->alamat_penerima;
            $temp['tlp_penerima'] = $data->tlp_penerima;
            $temp['nama_barang'] = $data->nama_barang;
            $temp['jenis_barang'] = $data->jenis_barang;
            $temp['kantor_asal'] = $data->kantor_asal;
            $temp['regional_asal'] = $data->regional_asal;
            $temp['kantor_tujuan'] = $data->kantor_tujuan;
            $temp['regional_tujuan'] = $data->regional_tujuan;
            $temp['berat_barang'] = $data->berat_barang;
            $temp['bea_kirim'] = $data->bea_kirim;
            $temp['total_harga'] = $data->total_harga;
            $temp['jenis_pembayaran'] = $data->jenis_pembayaran;
            // $temp['status'] = $data->status;
            $temp['id_petugas'] = $_SESSION['id_petugas'];
            //push to array
            array_push($result, $temp);
        };

      
    }
   	
   	foreach ($result as $data){
   		  $this->db->insert('Resi', $data);
   	}

        $this->db->query("DELETE FROM Data_pickup");


    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('data_pickup'));
  }

   public function generateResi($id,$tanggalTransaksi)
  {
    $result = '';
    // only get the date from datetime
    $date = date('Y-m-d', strtotime($tanggalTransaksi));
    $date = str_replace('-', '', $date);
    $date = substr($date, 2, 6);

    // generate resi
    $result = "P".$date . "0000000" .$id;
    return $result;
  }


  Public function importdatapickup(){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://hani.d3mi2020.com/pickup/getdatapickup',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: ci_session=4ahleg3fkltn0dub5bubniec0j9b5kbt'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
 $data=json_decode($response);
 // print_r($data);die();
    $result = [];
    foreach ($data as $data) {
      $temp = [];
      $id_order = $data->id_order;
      $oldIdPickup = $this->db->query("SELECT id_pickup from history_import where id_pickup='$id_order'")->num_rows();
        // cek apakah ada id_pickup yg sama?, jika tidak maka insert
      if($oldIdPickup<1){
        // $temp['id_pickup'] = $data->id_pickup;
        $temp['tanggal_transaksi'] = $data->tgl_transaksi;
        $temp['nama_pengirim'] = $data->nama_pengirim;
        $temp['alamat_pengirim'] = $data->alamat_pengirim;
        $temp['tlp_pengirim'] = $data->telp_pengirim;
        $temp['nama_penerima'] = $data->nama_penerima;
        $temp['alamat_penerima'] = $data->alamat_penerima;
        $temp['tlp_penerima'] = $data->telp_penerima;
        $temp['nama_barang'] = $data->nama_barang;
        $temp['jenis_barang'] = $data->jenis_barang;
        $temp['kantor_asal'] = $data->kantor_asal;
        $temp['regional_asal'] = $data->regional_asal;
        $temp['kantor_tujuan'] = $data->kantor_tujuan;
        $temp['regional_tujuan'] = $data->regional_tujuan;
        $temp['berat_barang'] = $data->berat;
        $temp['bea_kirim'] = $data->bea_kirim;
        $temp['total_harga'] = $data->total_harga;
        $temp['jenis_pembayaran'] = $data->jenis_pembayaran;
        // $temp['status'] = $data->status;
        //push to array
        array_push($result, $temp);

        $this->db->query("INSERT INTO history_import (id_pickup) VALUES ('$id_order')");
        }
    }
 foreach ($result as $data){

 	 $this->db->insert('Data_pickup', $data);
 }
 redirect(site_url('data_pickup'));
  }

    public function read($id) 
    {
        $row = $this->MData_pickup->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pickup' => $row->id_pickup,
		'tanggal_transaksi' => $row->tanggal_transaksi,
		'nama_pengirim' => $row->nama_pengirim,
		'alamat_pengirim' => $row->alamat_pengirim,
		'tlp_pengirim' => $row->tlp_pengirim,
		'nama_penerima' => $row->nama_penerima,
		'alamat_penerima' => $row->alamat_penerima,
		'tlp_penerima' => $row->tlp_penerima,
		'nama_barang' => $row->nama_barang,
        'jenis_barang' => $row->jenis_barang,
        'kantor_asal' => $row->kantor_asal,
        'regional_asal' => $row->regional_asal,
        'kantor_tujuan' => $row->kantor_tujuan,
		'regional_tujuan' => $row->regional_tujuan,
		'berat' => $row->berat,
		'bea_kirim' => $row->bea_kirim,
		'total_harga' => $row->total_harga,
		'jenis_pembayaran' => $row->jenis_pembayaran,
		'status' => $row->status,
	    );
            // $this->load->view('data_pickup/data_pickup_read', $data);
            $data['page'] = 'data_pickup/data_pickup_read';
		$this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_pickup'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_pickup/create_action'),
	    'id_pickup' => set_value('id_pickup'),
	    'tanggal_transaksi' => set_value('tanggal_transaksi'),
	    'nama_pengirim' => set_value('nama_pengirim'),
	    'alamat_pengirim' => set_value('alamat_pengirim'),
	    'tlp_pengirim' => set_value('tlp_pengirim'),
	    'nama_penerima' => set_value('nama_penerima'),
	    'alamat_penerima' => set_value('alamat_penerima'),
	    'tlp_penerima' => set_value('tlp_penerima'),
	    'nama_barang' => set_value('nama_barang'),
        'jenis_barang' => set_value('jenis_barang'),
        'kantor_asal' => set_value('kantor_asal'),
        'regional_asal' => set_value('regional_asal'),
        'kantor_tujuan' => set_value('kantor_tujuan'),
	    'regional_tujuan' => set_value('regional_tujuan'),
	    'berat_barang' => set_value('berat_barang'),
	    'bea_kirim' => set_value('bea_kirim'),
	    'total_harga' => set_value('total_harga'),
	    'jenis_pembayaran' => set_value('jenis_pembayaran'),
	    'status' => set_value('status'),
	);
        // $this->load->view('data_pickup/data_pickup_form', $data);
        $data['page'] = 'data_pickup/data_pickup_form';
		$this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'alamat_pengirim' => $this->input->post('alamat_pengirim',TRUE),
		'tlp_pengirim' => $this->input->post('tlp_pengirim',TRUE),
		'nama_penerima' => $this->input->post('nama_penerima',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'tlp_penerima' => $this->input->post('tlp_penerima',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
        'jenis_barang' => $this->input->post('jenis_barang',TRUE),
        'kantor_asal' => $this->input->post('kantor_asal',TRUE),
        'regional_asal' => $this->input->post('regional_asal',TRUE),
        'kantor_tujuan' => $this->input->post('kantor_tujuan',TRUE),
		'regional_tujuan' => $this->input->post('regional_tujuan',TRUE),
		'berat_barang' => $this->input->post('berat_barang',TRUE),
		'bea_kirim' => $this->input->post('bea_kirim',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
		'jenis_pembayaran' => $this->input->post('jenis_pembayaran',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MData_pickup->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_pickup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MData_pickup->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_pickup/update_action'),
		'id_pickup' => set_value('id_pickup', $row->id_pickup),
		'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
		'nama_pengirim' => set_value('nama_pengirim', $row->nama_pengirim),
		'alamat_pengirim' => set_value('alamat_pengirim', $row->alamat_pengirim),
		'tlp_pengirim' => set_value('tlp_pengirim', $row->tlp_pengirim),
		'nama_penerima' => set_value('nama_penerima', $row->nama_penerima),
		'alamat_penerima' => set_value('alamat_penerima', $row->alamat_penerima),
		'tlp_penerima' => set_value('tlp_penerima', $row->tlp_penerima),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
        'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
        'kantor_asal' => set_value('kantor_asal', $row->kantor_asal),
        'regional_asal' => set_value('regional_asal', $row->regional_asal),
        'kantor_tujuan' => set_value('kantor_tujuan', $row->kantor_tujuan),
		'regional_tujuan' => set_value('regional_tujuan', $row->regional_tujuan),
		'berat_barang' => set_value('berat_barang', $row->berat_barang),
		'bea_kirim' => set_value('bea_kirim', $row->bea_kirim),
		'total_harga' => set_value('total_harga', $row->total_harga),
		'jenis_pembayaran' => set_value('jenis_pembayaran', $row->jenis_pembayaran),
		'status' => set_value('status', $row->status),
	    );
            // $this->load->view('data_pickup/data_pickup_form', $data);
            $data['page'] = 'data_pickup/data_pickup_form';
		$this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_pickup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pickup', TRUE));
        } else {
            $data = array(
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'nama_pengirim' => $this->input->post('nama_pengirim',TRUE),
		'alamat_pengirim' => $this->input->post('alamat_pengirim',TRUE),
		'tlp_pengirim' => $this->input->post('tlp_pengirim',TRUE),
		'nama_penerima' => $this->input->post('nama_penerima',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'tlp_penerima' => $this->input->post('tlp_penerima',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
        'jenis_barang' => $this->input->post('jenis_barang',TRUE),
        'kantor_asal' => $this->input->post('kantor_asal',TRUE),
        'regional_asal' => $this->input->post('regional_asal',TRUE),
        'kantor_tujuan' => $this->input->post('kantor_tujuan',TRUE),
		'regional_tujuan' => $this->input->post('regional_tujuan',TRUE),
		'berat_barang' => $this->input->post('berat_barang',TRUE),
		'bea_kirim' => $this->input->post('bea_kirim',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
		'jenis_pembayaran' => $this->input->post('jenis_pembayaran',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->MData_pickup->update($this->input->post('id_pickup', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_pickup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MData_pickup->get_by_id($id);

        if ($row) {
            $this->MData_pickup->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_pickup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_pickup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
	$this->form_validation->set_rules('nama_pengirim', 'nama pengirim', 'trim|required');
	$this->form_validation->set_rules('alamat_pengirim', 'alamat pengirim', 'trim|required');
	$this->form_validation->set_rules('tlp_pengirim', 'tlp pengirim', 'trim|required');
	$this->form_validation->set_rules('nama_penerima', 'nama penerima', 'trim|required');
	$this->form_validation->set_rules('alamat_penerima', 'alamat penerima', 'trim|required');
	$this->form_validation->set_rules('tlp_penerima', 'tlp penerima', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
    $this->form_validation->set_rules('jenis_barang', 'jenis barang', 'trim|required');
    $this->form_validation->set_rules('kantor_asal', 'kantor asal', 'trim|required');
    $this->form_validation->set_rules('regional_asal', 'regional asal', 'trim|required');
    $this->form_validation->set_rules('kantor_tujuan', 'kantor_tujuan', 'trim|required');
    $this->form_validation->set_rules('regional_tujuan', 'regional_tujuan', 'trim|required');
	$this->form_validation->set_rules('berat_barang', 'berat barang', 'trim|required');
	$this->form_validation->set_rules('bea_kirim', 'bea kirim', 'trim|required');
	$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');
	$this->form_validation->set_rules('jenis_pembayaran', 'jenis pembayaran', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_pickup', 'id_pickup', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_pickup.xls";
        $judul = "data_pickup";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Transaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Penerima");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Penerima");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp Penerima");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
    xlsWriteLabel($tablehead, $kolomhead++, "Jenis Pembayaran");
    xlsWriteLabel($tablehead, $kolomhead++, "Kantor Asal");
    xlsWriteLabel($tablehead, $kolomhead++, "Regional Asal");
    xlsWriteLabel($tablehead, $kolomhead++, "Kantor Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Regional Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Bea Kirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->MData_pickup->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_transaksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pengirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_pengirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tlp_pengirim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tlp_penerima);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
        xlsWriteLabel($tablebody, $kolombody++, $data->jenis_barang);
        xlsWriteLabel($tablebody, $kolombody++, $data->kantor_asal);
        xlsWriteLabel($tablebody, $kolombody++, $data->regional_asal);
        xlsWriteLabel($tablebody, $kolombody++, $data->kantor_tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->regional_tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berat_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bea_kirim);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total_harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_pembayaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Data_pickup.php */
/* Location: ./application/controllers/Data_pickup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-30 14:49:37 */
/* http://harviacode.com */