<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalimatdisposisi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kalimatdisposisimodel');
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
    $data['kd'] = $this->kalimatdisposisimodel->tampilkd();
    $data['level'] = $this->session->userdata('level');
    $data['nama'] = $this->session->userdata('nama');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);
    $this->load->view('admin/kalimatdisposisi/kalimatdisposisi', $data);
  }
  function tambahkd(){
    $data = array(
      'idkd' => $this->input->post('idkd'),
      'kalimatdisposisi' => $this->input->post('kalimatdisposisi')
    );
    $this->kalimatdisposisimodel->tambahkd($data);
    redirect('administrator/kalimatdisposisi');
  }
  function editkd(){
    $id = $this->input->post('idkd');
    $data = array(
      'kalimatdisposisi' => $this->input->post('kalimatdisposisi')
    );
    $this->kalimatdisposisimodel->editkd($id, $data);
    redirect('administrator/kalimatdisposisi');
  }
  function hapuskd($id){
    $this->kalimatdisposisimodel->hapuskd($id);
    redirect('administrator/kalimatdisposisi');
  }

}
