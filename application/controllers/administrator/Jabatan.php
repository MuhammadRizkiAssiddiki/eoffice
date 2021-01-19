<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('jabatanmodel');
    $this->load->model('suratkeluarmodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level')!="administrator") {
      redirect('error');
    }
    // if ($this->session->userdata('nip')=="" || $this->session->userdata('level')!="administrator") {
    //   redirect('login');
    // }
  }

  function index()
  {
    $data['jabatan'] = $this->jabatanmodel->tampiljabatan();
    $data['level'] = $this->session->userdata('level');
    $data['uk'] = $this->jabatanmodel->getuk();
    $data['nama'] = $this->session->userdata('nama');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);
    $this->load->view('admin/jabatan/jabatan', $data);
  }
  function tambahjabatan(){
    $data = array(
      'idjabatan' => $this->input->post('idjabatan'),
      'idunitkerja' => $this->input->post('unitkerja'),
      'jabatan' => $this->input->post('jabatan'),
      'levelakses' => $this->input->post('levelakses')
    );
    $this->jabatanmodel->tambahjabatan($data);
    redirect('administrator/jabatan');
  }
  function editjabatan(){
    $id = $this->input->post('idjabatan');
    $data = array(
      'idunitkerja' => $this->input->post('idunitkerja'),
      'jabatan' => $this->input->post('jabatan'),
      'idunitkerja' => $this->input->post('unitkerja'),
      'levelakses' => $this->input->post('levelakses')

    );
    $this->jabatanmodel->editjabatan($id, $data);
    redirect('administrator/jabatan');
  }
  function hapusjabatan($id){
    $this->jabatanmodel->hapusjabatan($id);
    redirect('administrator/jabatan');
  }

}
