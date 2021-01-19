<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pegawaimodel');
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
    $data['nama'] = $this->session->userdata('nama');
    $data['pegawai'] = $this->pegawaimodel->tampilpegawai();
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);
    $this->load->view('admin/pegawai/pegawai', $data);
    //print_r($data);
  }
  function tambahpegawai(){
    $data['uk'] = $this->pegawaimodel->getuk();
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('admin/pegawai/tambahpegawai', $data);

  }
  function prosestambahpegawai(){
    $data = array(
      'nip' => $this->input->post('nip'),
      'nama' => $this->input->post('nama'),
      'tempatlahir' => $this->input->post('tempatlahir'),
      'tanggallahir' => $this->input->post('tanggallahir'),
      'jeniskelamin' => $this->input->post('jk'),
      'alamat' => $this->input->post('alamat'),
      'nohp' => $this->input->post('nohp'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'idunitkerja' => $this->input->post('unitkerja')
    );
    $this->pegawaimodel->tambahpegawai($data);
    redirect('administrator/pegawai');
  }
  function detailpegawai($id){
    $data['pegawai'] = $this->pegawaimodel->detailpegawai($id);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('admin/pegawai/detailpegawai', $data);
  }
  function editpegawai($id){
    $data['uk'] = $this->pegawaimodel->getuk();
    $data['pegawai'] = $this->pegawaimodel->detailpegawai($id);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('admin/pegawai/editpegawai', $data);
  }

  function proseseditpegawai(){
    $id = $this->input->post('nip');
    $data = array(
      'nama' => $this->input->post('nama'),
      'tempatlahir' => $this->input->post('tempatlahir'),
      'tanggallahir' => $this->input->post('tanggallahir'),
      'jeniskelamin' => $this->input->post('jk'),
      'alamat' => $this->input->post('alamat'),
      'nohp' => $this->input->post('nohp'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'idunitkerja' => $this->input->post('unitkerja')
    );
    $this->pegawaimodel->editpegawai($id, $data);
    redirect('administrator/pegawai');
  }
  function hapuspegawai($id){
    $this->pegawaimodel->hapuspegawai($id);
    redirect('administrator/pegawai');
  }

}
