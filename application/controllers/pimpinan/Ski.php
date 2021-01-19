<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ski extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('skimodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level')!="pimpinan") {
      redirect('error');
    }
  }

  function index()
  {
    $user = $this->session->userdata('jabatan');
    $nip = $this->session->userdata('nip');
    $data['ski'] = $this->skimodel->tampilski($user);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $data['notif'] = $this->skimodel->getnotif($nip);
    $data['total'] = $this->skimodel->gettotal($nip);
    $data['nd'] = $this->skimodel->getnd($nip);
    $data['td'] = $this->skimodel->getd($nip);

    $this->load->view('pimpinan/suratkeluar/ski', $data);
  }


  function detailski($id){
    $nip = $this->session->userdata('nip');
    $data['ski'] = $this->skimodel->detailski($id);
    $data['tujuan'] = $this->skimodel->gettujuan($id);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $data['notif'] = $this->skimodel->getnotif($nip);
    $data['total'] = $this->skimodel->gettotal($nip);
    $data['nd'] = $this->skimodel->getnd($nip);
    $data['td'] = $this->skimodel->getd($nip);
    //$data['disposisi'] = $this->suratmasukmodel->getdisposisi($id);


    $this->load->view('pimpinan/suratkeluar/detailski', $data);

  }

  function downloadsk($id){
    $this->load->helper('download');
    //lokasifile
    $file = 'filesurat/'.$id;

    //download file
    force_download($file, NULL);
  }

  function downloadlmp($id){
    $this->load->helper('download');
    //lokasifile
    $file = 'filesurat/'.$id;

    //download file
    force_download($file, NULL);
  }


}
