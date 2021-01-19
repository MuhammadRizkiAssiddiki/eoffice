<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratinternal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('suratinternalmodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level')!="operator") {
      redirect('error');
    }
    // if ($this->session->userdata('nip')=="" || $this->session->userdata('level')!="pimpinan") {
    //   redirect('login');
    // }
  }

  function index()
  {
    $data['si'] = $this->suratinternalmodel->tampilsi();
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratinternalmodel->getnd($nip);
    $data['td'] = $this->suratinternalmodel->getd($nip);

    $this->load->view('operator/suratinternal/suratinternal', $data);
  }

  function tambahsi($error = NULL, $error2 = NULL){
    $data['jp'] = $this->suratinternalmodel->getjp();
    $data['ss'] = $this->suratinternalmodel->getss();
    $data['js'] = $this->suratinternalmodel->getjs();
    $data['error']= $error;
    $data['error2']= $error2;
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratinternalmodel->getnd($nip);
    $data['td'] = $this->suratinternalmodel->getd($nip);
    $data['kode'] = $this->suratinternalmodel->getkode();

    $this->load->view('operator/suratinternal/tambahsi', $data);
  }
  function prosestambahsi(){

    //Upload Surat Masuk
    $config = array();
    $namafile = 'Surat Internal-'.$this->input->post('nosurat').'-'.$this->input->post('idsi');
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
    $namafile = 'Lampiran-'.$this->input->post('nosurat').'-'.$this->input->post('idsi');
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
      $this->tambahsi($error, $error2);
    }

    else if ( ! $this->surat->do_upload('filesurat')){
      $error= 'Maaf! Tipe file harus PDF!';
      $this->tambahsi($error, NULL);
      // $error = array('error' => $this->upload->display_errors());
      // $this->load->view('operator/rsm/tambahrsm', $error);
    } else if($_FILES['filelampiran']['size'] != NULL && ! $this->lampiran->do_upload('filelampiran')){
      $error2= 'Maaf! Tipe file harus PDF!';
      $this->tambahsi(NULL, $error2);
    } else if ($_FILES['filelampiran']['size'] != NULL) {
      $data = array(
        'idsi' => $this->input->post('idsi'),
        'nosurat' => $this->input->post('nosurat'),
        'idjenis' => $this->input->post('jenissurat'),
        'idsifat' => $this->input->post('sifatsurat'),
        'tanggalsurat' => $this->input->post('tanggalsurat'),
        'asalsurat' => $this->input->post('asalsurat'),
        'perihal' => $this->input->post('perihal'),
        'filesurat' => $this->surat->data('file_name'),
        'filelampiran' => $this->lampiran->data('file_name')

      );
      $this->suratinternalmodel->tambahsi($data);
      $idsi = $this->input->post('idsi');
      redirect('operator/suratinternal/detailsi/'.$idsi);
    } else{
      $data = array(
        'idsi' => $this->input->post('idsi'),
        'nosurat' => $this->input->post('nosurat'),
        'idjenis' => $this->input->post('jenissurat'),
        'idsifat' => $this->input->post('sifatsurat'),
        'tipesurat' => 'Surat Internal',
        'tanggalsurat' => $this->input->post('tanggalsurat'),
        'asalsurat' => $this->input->post('asalsurat'),
        'perihal' => $this->input->post('perihal'),
        'filesurat' => $this->surat->data('file_name')

      );


      $this->suratinternalmodel->tambahsi($data);
      $idsi = $this->input->post('idsi');
      redirect('operator/suratinternal/detailsi/'.$idsi);
    }
  }

  function detailsi($id){
    $data['si'] = $this->suratinternalmodel->detailsi($id);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $data['jp'] = $this->suratinternalmodel->gettujuan($id);
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->suratinternalmodel->getnd($nip);
    $data['td'] = $this->suratinternalmodel->getd($nip);

    $this->load->view('operator/suratinternal/detailsi', $data);
  }

  function datatujuansurat(){
    $idsm=$this->input->post('id');
    $data = $this->suratinternalmodel->getts($idsm);
    echo json_encode($data);
  }

  function setemail(){
    $idtujuan =$this->input->post('idtujuan');
    $idsm = $this->input->post('idsm');
    $emailtujuan = $this->suratinternalmodel->setemail($idtujuan);
    foreach ($emailtujuan as $a) {
      $data = array(
        'email' => $a['email'],
        'nama' => $a['nama']

      );
    }

    //$data.="<option value='37'>--Pilih Jurusan--</option>";
    // foreach ($emailtujuan as $a) {
    //   $data= $a['email'];
    // }
    echo json_encode($data);
  }

  function simpantujuansurat(){
    $iddetail = $this->suratinternalmodel->getid();
    $idsm = $this->input->post('id');
    $idtujuan = $this->input->post('tujuansurat');
    $toemail = $this->input->post('toemail');
    $nama = $this->input->post('nama');
    $asalsurat = $this->input->post('asalsurat');
    $data = array(
      'kodedrsm' => $iddetail,
      'idsm' => $idsm,
      'tujuansurat' => $idtujuan

    );

    $simpants = $this->suratinternalmodel->simpantujuansurat($data);

    $from_email = "encikassik@gmail.com";
    $emailtujuan = $toemail;
    $data['nama'] = $nama;
    $data['asalsurat'] = $asalsurat;
    $isi = $this->load->view('template/emailinternal', $data, true);


       $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_port' => 465,
              'smtp_user' => $from_email,
              'smtp_pass' => 'nevergiveup123',
              'mailtype'  => 'html',
              'charset'   => 'iso-8859-1'
      );

          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");

           $this->email->from($from_email, 'E-Office Universitas Abdurrab');
           $this->email->to($emailtujuan);
           $this->email->subject('Surat Masuk Baru');
           $this->email->message($isi);
           if($this->email->send()) {
             echo json_encode($simpants);
            } else {
           // show_error($this->email->print_debugger());
              echo json_encode($simpants);
            }
  }

  function sendemail($nama, $toemail)
  {

  }

  function downloadsurat($id){
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
