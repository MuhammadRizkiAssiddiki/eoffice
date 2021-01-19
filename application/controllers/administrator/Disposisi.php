<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('disposisimodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level')!="administrator") {
      redirect('error');
    }
  }

  function index()
  {
    $user = $this->session->userdata('idjp');
    $nip = $this->session->userdata('nip');
    $data['level'] = $this->session->userdata('level');
    $data['dsp'] = $this->disposisimodel->tampildsp($user);
    $data['nama'] = $this->session->userdata('nama');
    $data['notif'] = $this->disposisimodel->getnotif($nip);
    $data['total'] = $this->disposisimodel->gettotal($nip);
    $data['nd'] = $this->disposisimodel->getnd($nip);
    $data['td'] = $this->disposisimodel->getd($nip);

    $this->load->view('pimpinan/disposisi/disposisi', $data);
  }


  function detaildsp($id){
    //untuk form disposisi, ngambil data gitu, yang nip nya engga sama
    //dengan nip yang login
    $nip = $this->session->userdata('nip');
    $data['jp'] = $this->disposisimodel->getjp($nip);
    $data['kd'] = $this->disposisimodel->getkd();
    $data['level'] = $this->session->userdata('level');
    $data['notif'] = $this->disposisimodel->getnotif($nip);
    $data['total'] = $this->disposisimodel->gettotal($nip);
    $data['nd'] = $this->disposisimodel->getnd($nip);
    $data['td'] = $this->disposisimodel->getd($nip);

    $data['dsp'] = $this->disposisimodel->detaildsp($id);
    $data['nama'] = $this->session->userdata('nama');
    //$data['disposisi'] = $this->suratmasukmodel->getdisposisi($id);
    //cek status baca, buat ngerubah status kalau udah dibuka gitu
    $status = $this->disposisimodel->cekstatus($id);
    $user = $this->session->userdata('nama');


    $this->load->view('pimpinan/disposisi/detaildisposisi', $data);
    foreach ($status as $a) {
      if($a->statusdisposisi == 'Belum Dibaca'){
        $baca = 'Sudah Dibaca';
        $this->disposisimodel->ubahstatus($id, $baca);
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
    $data = $this->disposisimodel->getdisposisi($idsm);
    echo json_encode($data);
  }

  function simpandisposisi(){
    $tanggal = date("Y-m-d");
    $asal = $this->session->userdata('nama').' - '.$this->session->userdata('jabatan');
    $data = array(
      'idsm' => $this->input->post('idsm'),
      'tanggaldisposisi' => $tanggal,
      'asaldisposisi' => $asal,
      'tujuandisposisi' => $this->input->post('tujuandisposisi'),
      'isidisposisi' => $this->input->post('isidisposisi'),
      'sifatdisposisi' => $this->input->post('sifatdisposisi'),
      'catatan' => $this->input->post('catatan'),
      'statusdisposisi' => 'Belum Dibaca',
      'parent' => $this->input->post('parent')

    );

    $simpandsp = $this->disposisimodel->simpandisposisi($data);
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
