<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenissurat extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('jenissuratmodel');
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
    $data['jenis'] = $this->jenissuratmodel->tampiljs();
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);
    $this->load->view('admin/jenissurat/jenissurat', $data);
  }
  function tambahjs(){
    $data = array(
      'idjenis' => $this->input->post('kodejs'),
      'jenissurat' => $this->input->post('jenissurat')
    );
    $this->jenissuratmodel->tambahjs($data);
    redirect('administrator/jenissurat');
  }
  function editjs(){
    $id = $this->input->post('kodejs');
    $data = array(
      'jenissurat' => $this->input->post('jenissurat')
    );
    $this->jenissuratmodel->editjs($id, $data);
    redirect('administrator/jenissurat');
  }
  function hapusjs($id){
    $this->jenissuratmodel->hapusjs($id);
    redirect('administrator/jenissurat');
  }

}
