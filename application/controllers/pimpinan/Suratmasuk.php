<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('suratmasukmodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level') !="pimpinan") {
      redirect('error');
    }
  }

  function index()
  {
    $user = $this->session->userdata('nip');
    $data['sm'] = $this->suratmasukmodel->tampilsm($user);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $data['notif'] = $this->suratmasukmodel->getnotif($user);
    $data['total'] = $this->suratmasukmodel->gettotal($user);
    $data['nd'] = $this->suratmasukmodel->getnd($user);
    $data['td'] = $this->suratmasukmodel->getd($user);

    $this->load->view('pimpinan/suratmasuk/sm', $data);
  }


  function detailsm($id){
    $data['level'] = $this->session->userdata('level');
    $user = $this->session->userdata('nip');
    $data['jp'] = $this->suratmasukmodel->getjp($user);
    $data['kd'] = $this->suratmasukmodel->getkd();
    $data['sm'] = $this->suratmasukmodel->detailsm($id, $user);
    $data['nama'] = $this->session->userdata('nama');
    $data['notif'] = $this->suratmasukmodel->getnotif($user);
    $data['total'] = $this->suratmasukmodel->gettotal($user);
    $data['nd'] = $this->suratmasukmodel->getnd($user);
    $data['td'] = $this->suratmasukmodel->getd($user);
    $data['disposisi'] = $this->suratmasukmodel->totaldisposisi($id);
    $status = $this->suratmasukmodel->cekstatus($id);
    $user = $this->session->userdata('nama');


    $this->load->view('pimpinan/suratmasuk/detailsm', $data);
    foreach ($status as $a) {
      if($a->statusbaca == 'Belum Dibaca'){
        $baca = 'Sudah Dibaca';
        $this->suratmasukmodel->ubahstatus($id, $baca);
      }
    }
  }

  function downloadsm($id){
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

  function tampildisposisi($id){

    $data = $this->suratmasukmodel->getdisposisi($id);
    echo json_encode($data);
  }

  function datadisposisi(){
    $idsm=$this->input->post('id');
    $data = $this->suratmasukmodel->getdisposisi($idsm);
    echo json_encode($data);
  }

  function simpandisposisi(){
    $tanggal = date("Y-m-d");
    $asal = $this->session->userdata('nama').' - '.$this->session->userdata('jabatan');
    $data = array(
      'idsm' => $this->input->post('id'),
      'tanggaldisposisi' => $tanggal,
      'asaldisposisi' => $asal,
      'tujuandisposisi' => $this->input->post('tujuandisposisi'),
      'isidisposisi' => $this->input->post('isidisposisi'),
      'sifatdisposisi' => $this->input->post('sifatdisposisi'),
      'catatan' => $this->input->post('catatan'),
      'statusdisposisi' => 'Belum Dibaca',
      'parent' => $this->input->post('parent')

    );

    $simpandsp = $this->suratmasukmodel->simpandisposisi($data);
    echo json_encode($simpandsp);

    /*$tujuandisposisi=$this->input->post('tujuandisposisi');
		$isidisposisi=$this->input->post('isidisposisi');
		$sifatdisposisi=$this->input->post('sifatdisposisi');
    $catatan=$this->input->post('catatan');
		$data=$this->suratmasukmodel->simpandisposisi($tujuandisposisi,$isidisposisi,$sifatdisposisi,$catatan, $tanggal);
		echo json_encode($data); */
    //tinggal membuktikan insert tanpa reload di modal nya lagi
  }

}
