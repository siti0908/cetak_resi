<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('MPetugas', 'MKantor', 'MKeys'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'petugas/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'petugas/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'petugas/index?q';
            $config['first_url'] = base_url() . 'petugas/index?q';
        }

        $config['per_page'] = 12;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->MPetugas->total_rows($q);
        // print_r($config['total_rows'] );die();
        $petugas = $this->MPetugas->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'petugas_data' => $petugas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('petugas/petugas_list', $data);
        $data['page'] = 'petugas/petugas_list';
        $this->load->view('template',$data );
    }

    public function read($id) 
    {
        $row = $this->MPetugas->get_by_id($id);
        if ($row) {
            $data = array(
        'id_petugas' => $row->id_petugas,
        'nama_lengkap' => $row->nama_lengkap,
        'email' => $row->email,
        'nipos' => $row->nipos,
        'no_telp' => $row->no_telp,
        'status_pegawai' => $row->status_pegawai,
        'alamat' => $row->alamat,
        'username' => $row->username,
        'password' => $row->password,
        'hak_akses' => $row->hak_akses,
        'id_kantor' => $row->id_kantor,
        );
            // $this->load->view('petugas/petugas_read', $data);
            $data['page'] = 'petugas/petugas_read';
        $this->load->view('template',$data );
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas'));
        }
    }

    public function create() 
    {
        

        $data = array(
            'button' => 'Create',
            'action' => site_url('petugas/create_action'),
        'id_petugas' => set_value('id_petugas'),
        'nama_lengkap' => set_value('nama_lengkap'),
        'email' => set_value('email'),
        'nipos' => set_value('nipos'),
        'no_telp' => set_value('no_telp'),
        'status_pegawai' => set_value('status_pegawai'),
        'alamat' => set_value('alamat'),
        'username' => set_value('username'),
        'password' => set_value('password'),
        'hak_akses' => set_value('hak_akses'),
        'id_kantor' => set_value('id_kantor'),
    );
         //join tabel kantor
        $data['list_kantor'] =  $this->MKantor->get_all();
        // $this->load->view('user/user_form', $data);
        $data['page'] = 'petugas/petugas_form';
        $this->load->view('template',$data );
    }
    
public function create_action() 
    {

        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        'email' => $this->input->post('email',TRUE),
        'nipos' => $this->input->post('nipos',TRUE),
        'no_telp' => $this->input->post('no_telp',TRUE),
        'status_pegawai' => $this->input->post('status_pegawai',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'username' => $this->input->post('username',TRUE),
        'password' => $this->input->post('password',TRUE),
        'hak_akses' => $this->input->post('hak_akses',TRUE),
        'id_kantor' => $this->input->post('id_kantor',TRUE),
        );

        $id_petugas = $this->MPetugas->insert($data);

        $data = array(
            'user_id' => $id_petugas,
            'key' => md5(date('y-m-d H:i:s')),
            'level' => '1',
            'date_created' => '1'
        );



          // $id_petugas = $this->MPetugas->insert($data);
          
          //   if ($this->input->post('hak_akses',TRUE)=="Petugas Loket"){
          //     $dataPetugas = array(
          //       'id_petugas' => $id_petugas,
          //       'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
          //       'email' => $this->input->post('email',TRUE),
          //       'nipos' => $this->input->post('nipos',TRUE),
          //       'no_telp' => $this->input->post('no_telp',TRUE),
          //       'id_kantor' => $this->input->post('id_kantor',TRUE),
          //       'status_pegawai' => $this->input->post('status_pegawai',TRUE),
          //       );   
              
          //   $this->load->model('MPetugas','Petugas_Model');
          //   $this->Petugas_Model->insert($dataPetugas);
          //   };
            $this->MKeys->insert($data);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('petugas'));
        }
    }

           
    //         $this->session->set_flashdata('message', 'Create Record Success');
    //         redirect(site_url('petugas'));
    //     }
    // }
    
    
    public function update($id) 
    {
        $row = $this->MPetugas->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('petugas/update_action'),
        'id_petugas' => set_value('id_petugas', $row->id_petugas),
        'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
        'email' => set_value('email', $row->email),
        'nipos' => set_value('nipos', $row->nipos),
        'no_telp' => set_value('no_telp', $row->no_telp),
        'status_pegawai' => set_value('status_pegawai', $row->status_pegawai),
        'alamat' => set_value('alamat', $row->alamat),
        'username' => set_value('username', $row->username),
        'password' => set_value('password', $row->password),
        'hak_akses' => set_value('hak_akses', $row->hak_akses),
        'id_kantor' => set_value('id_kantor', $row->id_kantor),
        );

             //join tabel kantor
           $data['list_kantor'] =  $this->MKantor->get_all();
            // $this->load->view('user/user_form', $data);
            $data['page'] = 'petugas/petugas_form';
            $this->load->view('template',$data );

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_petugas', TRUE));
        } else {
            $data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        'email' => $this->input->post('email',TRUE),
        'nipos' => $this->input->post('nipos',TRUE),
        'no_telp' => $this->input->post('no_telp',TRUE),
        'status_pegawai' => $this->input->post('status_pegawai',TRUE),
        'alamat' => $this->input->post('alamat',TRUE),
        'username' => $this->input->post('username',TRUE),
        'password' => $this->input->post('password',TRUE),
        'hak_akses' => $this->input->post('hak_akses',TRUE),
        'id_kantor' => $this->input->post('id_kantor',TRUE),
        );
            

            $this->MPetugas->update($this->input->post('id_petugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('petugas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->MPetugas->get_by_id($id);

        if ($row) {
            $this->MPetugas->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('petugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('petugas'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');
    // $this->form_validation->set_rules('nipos', 'nipos', 'trim|required');
    $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
    // $this->form_validation->set_rules('status_pegawai', 'status pegawai', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    // $this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');
    $this->form_validation->set_rules('id_kantor', 'id kantor', 'trim|required');

    $this->form_validation->set_rules('id_petugas', 'id_petugas', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "petugas.xls";
        $judul = "petugas";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
    xlsWriteLabel($tablehead, $kolomhead++, "Email");
    xlsWriteLabel($tablehead, $kolomhead++, "Nipos");
    xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
    xlsWriteLabel($tablehead, $kolomhead++, "Status Pegawai");
    xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    xlsWriteLabel($tablehead, $kolomhead++, "Username");
    xlsWriteLabel($tablehead, $kolomhead++, "Password");
    xlsWriteLabel($tablehead, $kolomhead++, "Hak Akses");
    xlsWriteLabel($tablehead, $kolomhead++, "Id Kantor");

    foreach ($this->MPetugas->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
        xlsWriteLabel($tablebody, $kolombody++, $data->email);
        xlsWriteNumber($tablebody, $kolombody++, $data->nipos);
        xlsWriteLabel($tablebody, $kolombody++, $data->no_telp);
        xlsWriteLabel($tablebody, $kolombody++, $data->status_pegawai);
        xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
        xlsWriteLabel($tablebody, $kolombody++, $data->username);
        xlsWriteLabel($tablebody, $kolombody++, $data->password);
        xlsWriteLabel($tablebody, $kolombody++, $data->hak_akses);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_kantor);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-06-27 06:12:43 */
/* http://harviacode.com */