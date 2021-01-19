<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unitkerja extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('unitkerjamodel');
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
    $data['uk'] = $this->unitkerjamodel->tampiluk();
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);


    $this->load->view('admin/unitkerja/unitkerja', $data);
  }
  function tambahuk(){
    $data = array(
      'idunitkerja' => $this->input->post('idunitkerja'),
      'unitkerja' => $this->input->post('unitkerja')
    );
    $this->unitkerjamodel->tambahuk($data);
    redirect('administrator/unitkerja');
  }
  function edituk(){
    $id = $this->input->post('idunitkerja');
    $data = array(
      'unitkerja' => $this->input->post('unitkerja')
    );
    $this->unitkerjamodel->edituk($id, $data);
    redirect('administrator/unitkerja');
  }
  function hapusuk($id){
    $this->unitkerjamodel->hapusuk($id);
    redirect('administrator/unitkerja');
  }

}
