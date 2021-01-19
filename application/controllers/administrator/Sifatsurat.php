<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sifatsurat extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('sifatsuratmodel');
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
    $data['sifat'] = $this->sifatsuratmodel->tampilss();
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('admin/sifatsurat/sifatsurat', $data);

  }
  function tambahss(){
    $data = array(
      'idsifat' => $this->input->post('idsifat'),
      'sifatsurat' => $this->input->post('sifatsurat')
    );
    $this->sifatsuratmodel->tambahss($data);
    redirect('administrator/sifatsurat');
  }
  function editss(){
    $id = $this->input->post('idsifat');
    $data = array(
      'sifatsurat' => $this->input->post('sifatsurat')
    );
    $this->sifatsuratmodel->editss($id, $data);
    redirect('administrator/sifatsurat');
  }
  function hapusss($id){
    $this->sifatsuratmodel->hapusss($id);
    redirect('administrator/sifatsurat');
  }

}
