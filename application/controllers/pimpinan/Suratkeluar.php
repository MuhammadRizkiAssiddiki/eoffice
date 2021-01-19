<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('skmodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level')!="pimpinan") {
      redirect('error');
    }
  }

  function index()
  {
    $user = $this->session->userdata('idjp');
    $nip = $this->session->userdata('nip');
    $data['sk'] = $this->skmodel->tampilsk($user);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $data['notif'] = $this->skmodel->getnotif($nip);
    $data['total'] = $this->skmodel->gettotal($nip);
    $data['nd'] = $this->skmodel->getnd($nip);
    $data['td'] = $this->skmodel->getd($nip);

    $this->load->view('pimpinan/suratkeluar/sk', $data);
  }


  function detailsk($id){
    $nip = $this->session->userdata('nip');
    $data['sk'] = $this->skmodel->detailsk($id);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $data['notif'] = $this->skmodel->getnotif($nip);
    $data['total'] = $this->skmodel->gettotal($nip);
    $data['nd'] = $this->skmodel->getnd($nip);
    $data['td'] = $this->skmodel->getd($nip);
    //$data['disposisi'] = $this->suratmasukmodel->getdisposisi($id);


    $this->load->view('pimpinan/suratkeluar/detailsk', $data);

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
