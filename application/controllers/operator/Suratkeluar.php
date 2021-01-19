<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('suratkeluarmodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level')!="operator") {
      redirect('error');
    }
    // if ($this->session->userdata('nip')=="" || $this->session->userdata('level')!="pimpinan") {
    //   redirect('login');
    // }
    // BUAT TABEL SURAT INTERNAL, DISPOSISI INTERNAL, SURAT KELUAR INTERNAL(?)
  }

  function index()
  {
    $data['sk'] = $this->suratkeluarmodel->tampilsk();
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('operator/suratkeluar/suratkeluar', $data);
  }

  function tambahsk($error = NULL, $error2 = NULL){
    $data['jp'] = $this->suratkeluarmodel->getjp();
    $data['level'] = $this->session->userdata('level');
    $data['ss'] = $this->suratkeluarmodel->getss();
    $data['js'] = $this->suratkeluarmodel->getjs();
    $data['error']= $error;
    $data['error2']= $error2;
    $data['nama'] = $this->session->userdata('nama');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('operator/suratkeluar/tambahsk', $data);
  }
  function prosestambahsk(){

    //Upload Surat Masuk
    $config = array();
    $namafile = 'Surat Keluar-'.$this->input->post('nosurat').'-'.$this->input->post('tujuansurat').'-'.$this->input->post('idsk');
    $config['upload_path'] = './filesurat/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']	= '0'; //in kb
    $config['file_name'] = $namafile;
    $this->load->library('upload', $config, 'surat');
    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';
    $this->surat->initialize($config);

    //Upload FIle Lampiran
    $config = array();
    $namafile = 'Lampiran Surat Keluar-'.$this->input->post('nosurat').'-'.$this->input->post('tujuansurat').'-'.$this->input->post('idsk');
    $config['upload_path'] = './filesurat/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']	= '0'; //in kb
    $config['file_name'] = $namafile;
    $this->load->library('upload', $config, 'lampiran');

    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';
    $this->lampiran->initialize($config);


    if( ! $this->surat->do_upload('filesurat') && $_FILES['filelampiran']['size'] != NULL && ! $this->lampiran->do_upload('filelampiran')){
      $error= 'Maaf! Tipe file harus PDF!';
      $error2= 'Maaf! Tipe file harus PDF!';
      $this->tambahsk($error, $error2);
    }

    else if ( ! $this->surat->do_upload('filesurat')){
    $error= 'Maaf! Tipe file harus PDF!';
    $this->tambahsk($error, NULL);
    // $error = array('error' => $this->upload->display_errors());
    // $this->load->view('operator/rsm/tambahrsm', $error);
    } else if($_FILES['filelampiran']['size'] != NULL && ! $this->lampiran->do_upload('filelampiran')){
    $error2= 'Maaf! Tipe file harus PDF!';
    $this->tambahsk(NULL, $error2);
    } else{
      $data = array(
        'idsk' => $this->input->post('idsk'),
        'nosurat' => $this->input->post('nosurat'),
        'tanggalsurat' => $this->input->post('tanggalsurat'),
        'idjenis' => $this->input->post('jenissurat'),
        'idsifat' => $this->input->post('sifatsurat'),
        'pj' => $this->input->post('pj'),
        'tujuansurat' => $this->input->post('tujuansurat'),
        'perihal' => $this->input->post('perihal'),
        'filesurat' => $this->surat->data('file_name'),
        'filelampiran' => $this->lampiran->data('file_name')

      );


      $this->suratkeluarmodel->tambahsk($data);
      redirect('operator/suratkeluar');
    }
  }

  function detailsk($id){
    $data['sk'] = $this->suratkeluarmodel->detailsk($id);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratkeluarmodel->getnd($nip);
    $data['td'] = $this->suratkeluarmodel->getd($nip);

    $this->load->view('operator/suratkeluar/detailsk', $data);
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
