<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Regional extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MRegional');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'regional/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'regional/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'regional/index.html';
            $config['first_url'] = base_url() . 'regional/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MRegional->total_rows($q);
        $regional = $this->MRegional->get_limit_data($config['per_page'], $start, $q);
        $regional= $this->db->query("SELECT * FROM regional order by id_regional ASC")->result();


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'regional_data' => $regional,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
         $data['page'] = 'regional/regional_list';
        $this->load->view('template',$data );
        // $this->load->view('regional/regional_list', $data);
    }

    public function read($id) 
    {
        $row = $this->MRegional->get_by_id($id);
        if ($row) {
            $data = array(
		'id_regional' => $row->id_regional,
		'regional' => $row->regional,
        'nama_kota' => $row->nama_kota,
		'cabang_regional' => $row->cabang_regional,
        'nopend' => $row->nopend,
		'tipe_kantor' => $row->tipe_kantor,
	    );
            $data['page'] = 'regional/regional_read';
            $this->load->view('template',$data );
            // $this->load->view('regional/regional_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regional'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('regional/create_action'),
	    'id_regional' => set_value('id_regional'),
	    'regional' => set_value('regional'),
        'nama_kota' => set_value('nama_kota'),
	    'cabang_regional' => set_value('cabang_regional'),
        'nopend' => set_value('nopend'),
	    'tipe_kantor' => set_value('tipe_kantor'),
	);
        $data['page'] = 'regional/regional_form';
        $this->load->view('template',$data );
        // $this->load->view('regional/regional_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'regional' => $this->input->post('regional',TRUE),
        'nama_kota' => $this->input->post('nama_kota',TRUE),
		'cabang_regional' => $this->input->post('cabang_regional',TRUE),
        'nopend' => $this->input->post('nopend',TRUE),
		'tipe_kantor' => $this->input->post('tipe_kantor',TRUE),
	    );

            $this->MRegional->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('regional'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MRegional->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('regional/update_action'),
		'id_regional' => set_value('id_regional', $row->id_regional),
		'regional' => set_value('regional', $row->regional),
        'nama_kota' => set_value('nama_kota', $row->nama_kota),
		'cabang_regional' => set_value('cabang_regional', $row->cabang_regional),
        'nopend' => set_value('nopend', $row->nopend),
		'tipe_kantor' => set_value('tipe_kantor', $row->tipe_kantor),
	    );
            $data['page'] = 'regional/regional_form';
            $this->load->view('template',$data );
            // $this->load->view('regional/regional_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regional'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_regional', TRUE));
        } else {
            $data = array(
		'regional' => $this->input->post('regional',TRUE),
        'nama_kota' => $this->input->post('nama_kota',TRUE),
		'cabang_regional' => $this->input->post('cabang_regional',TRUE),
        'nopend' => $this->input->post('nopend',TRUE),
		'tipe_kantor' => $this->input->post('tipe_kantor',TRUE),
	    );

            $this->MRegional->update($this->input->post('id_regional', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('regional'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MRegional->get_by_id($id);

        if ($row) {
            $this->MRegional->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('regional'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('regional'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('regional', 'regional', 'trim|required');
    $this->form_validation->set_rules('nama_kota', 'nama kota', 'trim|required');
	$this->form_validation->set_rules('cabang_regional', 'cabang regional', 'trim|required');
    $this->form_validation->set_rules('nopend', 'nopend', 'trim|required');
	$this->form_validation->set_rules('tipe_kantor', 'tipe kantor', 'trim|required');

	$this->form_validation->set_rules('id_regional', 'id_regional', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "regional.xls";
        $judul = "regional";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Regional");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Cabang Regional");
    xlsWriteLabel($tablehead, $kolomhead++, "Nopend");
	xlsWriteLabel($tablehead, $kolomhead++, "Tipe Kantor");

	foreach ($this->MRegional->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->regional);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->cabang_regional);
        xlsWriteNumber($tablebody, $kolombody++, $data->nopend);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tipe_kantor);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Regional.php */
/* Location: ./application/controllers/Regional.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-14 08:32:40 */
/* http://harviacode.com */