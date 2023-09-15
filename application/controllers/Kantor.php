<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kantor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('MKantor');
        $this->load->model(array('MKantor', 'MRegional'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kantor/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kantor/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kantor/index.html';
            $config['first_url'] = base_url() . 'kantor/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MKantor->total_rows($q);
        $kantor = $this->MKantor->get_limit_data($config['per_page'], $start, $q);
        // $kantor = $this->db->query("SELECT * FROM kantor order by id_kantor DESC")->result();


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kantor_data' => $kantor,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('kantor/kantor_list', $data);
        $data['page'] = 'kantor/kantor_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MKantor->get_by_id($id);
        if ($row) {
            $data = array(
        'id_kantor' => $row->id_kantor,
        'nama_kota' => $row->nama_kota,
        'cabang_regional' => $row->cabang_regional,
        'alamat' => $row->alamat,
        'kode_pos' => $row->kode_pos,
        'phone' => $row->phone,
        'nopend' => $row->nopend,
        // 'nopend_kcu' => $row->nopend_kcu,
        // 'nopend_kprk' => $row->nopend_kprk,
        'regional' => $row->regional,
        'tipe_kantor' => $row->tipe_kantor,
        );
            // $this->load->view('kantor/kantor_read', $data);
            $data['page'] = 'kantor/kantor_read';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantor'));
        }
    }

 public function get_regional()
    {
        $id = $this->input->post('cabang_regional');
        $data = $this->db->query("select * from regional where cabang_regional='$id'")->row();
        echo json_encode($data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kantor/create_action'),
        'id_kantor' => set_value('id_kantor'),
        'nama_kota' => set_value('nama_kota'),
        'cabang_regional' => set_value('cabang_regional'),
        'alamat' => set_value('alamat'),
        'kode_pos' => set_value('kode_pos'),
        'phone' => set_value('phone'),
        'nopend' => set_value('nopend'),
        // 'nopend_kcu' => set_value('nopend_kcu'),
        // 'nopend_kprk' => set_value('nopend_kprk'),
        'regional' => set_value('regional'),
        'tipe_kantor' => set_value('tipe_kantor'),
    );
        $data['list_regional'] =  $this->MRegional->get_all();

        // $this->load->view('kantor/kantor_form', $data);
         $data['page'] = 'kantor/kantor_form';
        $this->load->view('template',$data );
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'nama_kota' => $this->input->post('nama_kota',TRUE),
        'cabang_regional' => $this->input->post('cabang_regional',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'kode_pos' => $this->input->post('kode_pos',TRUE),
        'phone' => $this->input->post('phone',TRUE),
        'nopend' => $this->input->post('nopend',TRUE),
        // 'nopend_kcu' => $this->input->post('nopend_kcu',TRUE),
        // 'nopend_kprk' => $this->input->post('nopend_kprk',TRUE),
        'regional' => $this->input->post('regional',TRUE),
        'tipe_kantor' => $this->input->post('tipe_kantor',TRUE),
        );

            $this->MKantor->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kantor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->MKantor->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kantor/update_action'),
        'id_kantor' => set_value('id_kantor', $row->id_kantor),
        'nama_kota' => set_value('nama_kota', $row->nama_kota),
        'cabang_regional' => set_value('cabang_regional', $row->cabang_regional),
        'alamat' => set_value('alamat', $row->alamat),
        'kode_pos' => set_value('kode_pos', $row->kode_pos),
        'phone' => set_value('phone', $row->phone),
        'nopend' => set_value('nopend', $row->nopend),
        // 'nopend_kcu' => set_value('nopend_kcu', $row->nopend_kcu),
        // 'nopend_kprk' => set_value('nopend_kprk', $row->nopend_kprk),
        'regional' => set_value('regional', $row->regional),
        'tipe_kantor' => set_value('tipe_kantor', $row->tipe_kantor),
        );
        $data['list_regional'] =  $this->MRegional->get_all();

            // $this->load->view('kantor/kantor_form', $data);
            $data['page'] = 'kantor/kantor_form';
            $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kantor', TRUE));
        } else {
            $data = array(
        'nama_kota' => $this->input->post('nama_kota',TRUE),
        'cabang_regional' => $this->input->post('cabang_regional',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'kode_pos' => $this->input->post('kode_pos',TRUE),
        'phone' => $this->input->post('phone',TRUE),
        'nopend' => $this->input->post('nopend',TRUE),
        // 'nopend_kcu' => $this->input->post('nopend_kcu',TRUE),
        // 'nopend_kprk' => $this->input->post('nopend_kprk',TRUE),
        'regional' => $this->input->post('regional',TRUE),
        'tipe_kantor' => $this->input->post('tipe_kantor',TRUE),
        );

            $this->MKantor->update($this->input->post('id_kantor', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kantor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MKantor->get_by_id($id);

        if ($row) {
            $this->MKantor->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kantor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kantor'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_kota', 'nama kota', 'trim|required');
    $this->form_validation->set_rules('cabang_regional', 'cabang regional', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
    $this->form_validation->set_rules('nopend', 'nopend', 'trim|required');
    // $this->form_validation->set_rules('nopend_kcu', 'nopend kcu', 'trim|required');
    // $this->form_validation->set_rules('nopend_kprk', 'nopend kprk', 'trim|required');
    $this->form_validation->set_rules('regional', 'regional', 'trim|required');
    $this->form_validation->set_rules('tipe_kantor', 'tipe kantor', 'trim|required');

    $this->form_validation->set_rules('id_kantor', 'id_kantor', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kantor.xls";
        $judul = "kantor";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kota");
    xlsWriteLabel($tablehead, $kolomhead++, "Cabang Regional");
    xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    xlsWriteLabel($tablehead, $kolomhead++, "Kode Pos");
    xlsWriteLabel($tablehead, $kolomhead++, "Phone");
    xlsWriteLabel($tablehead, $kolomhead++, "Nopend");
    // xlsWriteLabel($tablehead, $kolomhead++, "Nopend Kcu");
    // xlsWriteLabel($tablehead, $kolomhead++, "Nopend Kprk");
    xlsWriteLabel($tablehead, $kolomhead++, "Regional");
    xlsWriteLabel($tablehead, $kolomhead++, "Tipe Kantor");

    foreach ($this->MKantor->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_kota);
        xlsWriteLabel($tablebody, $kolombody++, $data->cabang_regional);
        xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
        xlsWriteNumber($tablebody, $kolombody++, $data->kode_pos);
        xlsWriteLabel($tablebody, $kolombody++, $data->phone);
        xlsWriteNumber($tablebody, $kolombody++, $data->nopend);
        // xlsWriteNumber($tablebody, $kolombody++, $data->nopend_kcu);
        // xlsWriteNumber($tablebody, $kolombody++, $data->nopend_kprk);
        xlsWriteLabel($tablebody, $kolombody++, $data->regional);
        xlsWriteLabel($tablebody, $kolombody++, $data->tipe_kantor);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Kantor.php */
/* Location: ./application/controllers/Kantor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-27 10:43:40 */
/* http://harviacode.com */