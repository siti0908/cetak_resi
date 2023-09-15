<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('MResi');
        $this->load->model(array('MResi', 'MPetugas'));
        $this->load->library('form_validation');
    }

    public function index($row=NULL)
    {

        $this->load->helper('barcode');
        $this->load->helper('qrcode');
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'resi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'resi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'resi/index.html';
            $config['first_url'] = base_url() . 'resi/index.html';
        }

        $config['page_query_string'] = TRUE;
        if ($row) {
            $config['per_page'] = $row;
            $config['total_rows'] = $row;
        }else{
            $config['per_page'] = 100;
               $config['total_rows'] = $this->MResi->total_rows($q);
        }
        
        $resi = $this->MResi->get_limit_data($config['per_page'], $start, $q);

// print_r($resi);die();
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'resi_data' => $resi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->load->view('resi/resi_list', $data);
        $data['page'] = 'resi/resi_list';
        $this->load->view('template',$data );


    }
 function tampillaporan(){ 
        $awal = $this->input->post('txtTglAwal',TRUE);
        $akhir = $this->input->post('txtTglAkhir',TRUE);
        $data['resi_data'] = $this->MResi->get_laporan_by_date($awal, $akhir);
        $data['list_petugas'] =  $this->MPetugas->get_all();
        $data['page'] = 'resi/resi_list';
        $this->load->view('template', $data);
        //$this->load->view('laporan/laporan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MResi->get_by_id($id);
        if ($row) {
            $data = array(
		'kode_resi' => $row->kode_resi,
		'id_order' => $row->id_order,
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
		'berat_barang' => $row->berat_barang,
        'bea_kirim' => $row->bea_kirim,
        'total_harga' => $row->total_harga,
		'jenis_pembayaran' => $row->jenis_pembayaran,
		'id_petugas' => $row->id_petugas,
	    );
            //$this->load->view('resi/resi_read', $data);
            $data['page'] = 'resi/resi_read';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resi'));
        }
    }

    public function print()
    {
        $this->load->helper('qrcode');
        //$data['project'] = $this->db->query("SELECT id,project_code,name,client_name FROM PROJECT")->result_array();
        $data['resi_data'] = $this->db->query("SELECT id_order,tanggal_transaksi,nama_pengirim,alamat_pengirim,tlp_pengirim,nama_penerima,alamat_penerima, tlp_penerima,nama_barang, jenis_barang,kantor_asal,regional_asal,kantor_tujuan,regional_tujuan,berat_barang,bea_kirim,total_harga,jenis_pembayaran,id_petugas FROM resi")->result();
        $this->load->view('print', $data);
    }

    public function cetak_resi($id_order)
    {
        $this->load->helper('qrcode');
        // Load Zend Barcode Helper
        $this->load->helper('barcode');

        //$data['detail_project'] = $this->db->query("SELECT * FROM PROJECT WHERE id='$id'")->row_array();
        $data['resi_data'] = $this->db->query("SELECT * FROM resi WHERE id_order='$id_order'")->row_array();
        $this->load->view('cetak_resi', $data);
    }


public function cetak_all_resi($row=NULL)
    {
        $this->load->helper('qrcode');
        // Load Zend Barcode Helper
        $this->load->helper('barcode');
        
        $config['page_query_string'] = TRUE;
        if ($row) {
            $config['per_page'] = $row;
        }else{
            $config['per_page'] = 100;
        }

       // print_r( $config['per_page']);die;
        
        $resi = $this->MResi->get_limit_data($config['per_page'], 0);

        $data = array(
            'resi_data' => $resi,
        );
      
        $this->load->view('cetak_all_resi', $data);
    }

     public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('resi/create_action'),
	    'kode_resi' => set_value('kode_resi'),
	    'id_order' => set_value('id_order'),
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
	    'id_petugas' => set_value('id_petugas'),
	);
        $data['list_petugas'] =  $this->MPetugas->get_all();
        //$this->load->view('resi/resi_form', $data);
         $data['page'] = 'resi/resi_form';
        $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_order' => $this->input->post('id_order',TRUE),
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
		'id_petugas' => $this->input->post('id_petugas',TRUE),
	    );

            $this->MResi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('resi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MResi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('resi/update_action'),
		'kode_resi' => set_value('kode_resi', $row->kode_resi),
		'id_order' => set_value('id_order', $row->id_order),
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
		'id_petugas' => set_value('id_petugas', $row->id_petugas),
	    );
       
             $data['list_petugas'] =  $this->MPetugas->get_all();
            //$this->load->view('resi/resi_form', $data);
            $data['page'] = 'resi/resi_form';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_resi', TRUE));
        } else {
            $data = array(
		'id_order' => $this->input->post('id_order',TRUE),
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
		'id_petugas' => $this->input->post('id_petugas',TRUE),
	    );

            $this->MResi->update($this->input->post('kode_resi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('resi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MResi->get_by_id($id);

        if ($row) {
            $this->MResi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('resi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_order', 'id order', 'trim|required');
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
    $this->form_validation->set_rules('kantor_tujuan', 'kantor tujuan', 'trim|required');
	$this->form_validation->set_rules('regional_tujuan', 'regional tujuan', 'trim|required');
	$this->form_validation->set_rules('berat_barang', 'berat barang', 'trim|required');
	$this->form_validation->set_rules('bea_kirim', 'bea kirim', 'trim|required');
    $this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');
	$this->form_validation->set_rules('jenis_pembayaran', 'jenis pembayaran', 'trim|required');
	$this->form_validation->set_rules('id_petugas', 'id_petugas', 'trim|required');

	$this->form_validation->set_rules('kode_resi', 'kode_resi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "resi.xls";
        $judul = "resi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Order");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Transaksi");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengirim");
    xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pengirim");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp Pengirim");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Penerima");
    xlsWriteLabel($tablehead, $kolomhead++, "Alamat Penerima");
    xlsWriteLabel($tablehead, $kolomhead++, "Tlp Penerima");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Barang");
    xlsWriteLabel($tablehead, $kolomhead++, "Kantor Asal");
    xlsWriteLabel($tablehead, $kolomhead++, "Regional Asal");
    xlsWriteLabel($tablehead, $kolomhead++, "Kantor Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Regional Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Berat Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Bea Kirim");
    xlsWriteLabel($tablehead, $kolomhead++, "Total Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Petugas");

	foreach ($this->MResi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_order);
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
	    xlsWriteLabel($tablebody, $kolombody++, $data->bea_kirim);
        xlsWriteLabel($tablebody, $kolombody++, $data->total_harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_pembayaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_petugas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file resi.php */
/* Location: ./application/controllers/resi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-03-09 04:05:33 */
/* http://harviacode.com */