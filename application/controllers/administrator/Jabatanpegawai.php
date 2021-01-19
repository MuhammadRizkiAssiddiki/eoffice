<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatanpegawai extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('jabatanpegawaimodel');
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
    $data['jp'] = $this->jabatanpegawaimodel->tampiljp();
    $data['level'] = $this->session->userdata('level');
    $data['jabatan'] = $this->jabatanpegawaimodel->getjabatan();
    $data['pegawai'] = $this->jabatanpegawaimodel->getpegawai();
    $data['nama'] = $this->session->userdata('nama');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('admin/jabatanpegawai/jabatanpegawai', $data);
  }
  function tambahjp(){
    $data = array(
      'idjp' => $this->input->post('idjp'),
      'idjabatan' => $this->input->post('jabatan'),
      'nip' => $this->input->post('nip')
    );
    $this->jabatanpegawaimodel->tambahjp($data);
    redirect('administrator/jabatanpegawai');
  }
  function editjp(){
    $id = $this->input->post('idjp');
    $data = array(
      'idjabatan' => $this->input->post('jabatan'),
      'nip' => $this->input->post('nip')
    );
    $this->jabatanpegawaimodel->editjp($id, $data);
    redirect('administrator/jabatanpegawai');
  }
  function hapusjp($id){
    $this->jabatanpegawaimodel->hapusjp($id);
    redirect('administrator/jabatanpegawai');
  }

}
