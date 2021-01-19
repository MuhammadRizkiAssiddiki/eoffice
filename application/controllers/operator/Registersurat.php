<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registersurat extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('registersuratmodel');
    if ($this->session->userdata('nip')=="") {
      redirect('login');
    }
    else if ($this->session->userdata('level')!="operator") {
      redirect('error');
    }
    // if ($this->session->userdata('nip')=="" || $this->session->userdata('level')!="pimpinan") {
    //   redirect('login');
    // } iOGBffX8o4LR^u&m)(mW
  }

  function index()
  {
    $data['rsm'] = $this->registersuratmodel->tampilrsm();
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->registersuratmodel->getnd($nip);
    $data['td'] = $this->registersuratmodel->getd($nip);

    $this->load->view('operator/rsm/rsm', $data);
  }

  function tambahrsm($error = NULL, $error2 = NULL){
    $data['jp'] = $this->registersuratmodel->getjp();
    $data['ss'] = $this->registersuratmodel->getss();
    $data['js'] = $this->registersuratmodel->getjs();
    $data['error']= $error;
    $data['error2']= $error2;
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->registersuratmodel->getnd($nip);
    $data['td'] = $this->registersuratmodel->getd($nip);
    $data['kode'] = $this->registersuratmodel->getkode();

    $this->load->view('operator/rsm/tambahrsm', $data);
  }
  function prosestambahrsm(){

    //Upload Surat Masuk
    $config = array();
    $namafile = 'Surat Masuk-'.$this->input->post('nosurat').'-'.$this->input->post('asalsurat').'-'.$this->input->post('idrsm');
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
    $namafile2 = 'Lampiran-'.$this->input->post('nosurat').'-'.$this->input->post('asalsurat').'-'.$this->input->post('idrsm');
    $config['upload_path'] = './filesurat/';
    $config['allowed_types'] = 'pdf';
    $config['max_size']	= '0'; //in kb
    $config['file_name'] = $namafile2;
    $this->load->library('upload', $config, 'lampiran');

    // $config['max_width']  = '1024';
    // $config['max_height']  = '768';
    $this->lampiran->initialize($config);


    if( ! $this->surat->do_upload('filesurat') && $_FILES['filelampiran']['size'] != NULL && ! $this->lampiran->do_upload('filelampiran')){
      $error= 'Maaf! Tipe file harus PDF!';
      $error2= 'Maaf! Tipe file harus PDF!';
      $this->tambahrsm($error, $error2);
    }

    else if ( ! $this->surat->do_upload('filesurat')){
      $error= 'Maaf! Tipe file harus PDF!';
      $this->tambahrsm($error, NULL);
      // $error = array('error' => $this->upload->display_errors());
      // $this->load->view('operator/rsm/tambahrsm', $error);
    } else if($_FILES['filelampiran']['size'] != NULL && ! $this->lampiran->do_upload('filelampiran')){
      $error2= 'Maaf! Tipe file harus PDF!';
      $this->tambahrsm(NULL, $error2);
    } else if ($_FILES['filelampiran']['size'] != NULL) {
      $data = array(
        'idsi' => $this->input->post('idrsm'),
        'nosurat' => $this->input->post('nosurat'),
        'idjenis' => $this->input->post('jenissurat'),
        'idsifat' => $this->input->post('sifatsurat'),
        'tipesurat' => 'Surat Eksternal',
        'tanggalterima' => $this->input->post('tanggalterima'),
        'tanggalsurat' => $this->input->post('tanggalsurat'),
        'asalsurat' => $this->input->post('asalsurat'),
        'perihal' => $this->input->post('perihal'),
        'filesurat' => $this->surat->data('file_name'),
        'filelampiran' => $this->lampiran->data('file_name')

      );
      $this->registersuratmodel->tambahrsm($data);

      $iddetail = $this->registersuratmodel->getid();
      $insert = array(
        'kodedrsm' => $iddetail,
        'idsm' => $this->input->post('idrsm'),
        'tujuansurat' => $this->input->post('tujuansurat')

      );

      $this->registersuratmodel->simpantujuansurat($insert);

      $from_email = "youremail@gmail.com";
      $idsm = $this->input->post('idrsm');
      $idtujuan = $this->input->post('tujuansurat');
      $emailtujuan = $this->registersuratmodel->getemail($idsm, $idtujuan);
      $data['email'] = $this->registersuratmodel->getemail($idsm, $idtujuan);
      $isi = $this->load->view('template/email', $data, true);


         $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => 'yourpassword',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
        );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

         foreach ($emailtujuan as $e) {
           if ($e['email']) {

             $this->email->from($from_email, 'E-Office Universitas Abdurrab');
             $this->email->to($e['email']);
             $this->email->subject('Surat Masuk Baru');
             $this->email->message($isi);
             if($this->email->send()) {
               $this->session->set_flashdata('notif',
               '
               <div class="col-md-3"></div>
               <div class="col-md-4">
               <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               <strong>Notifikasi email telah terkirim kepada penerima surat.</strong>
               </div>
               </div>
               <div class="col-md-3"></div>
               '
             );
              } else {
             // show_error($this->email->print_debugger());
                $this->session->set_flashdata('notif',
                '
                <div class="col-md-3"></div>
                <div class="col-md-7">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Notifikasi email belum terkirim kepada penerima surat. Silahkan periksa koneksi jaringan internet Anda.</strong>
                </div>
                </div>
                <div class="col-md-3"></div>
                '
                );
              }

           }

      redirect('operator/registersurat');
    }
  }else{
      $data = array(
        'idsi' => $this->input->post('idrsm'),
        'nosurat' => $this->input->post('nosurat'),
        'idjenis' => $this->input->post('jenissurat'),
        'idsifat' => $this->input->post('sifatsurat'),
        'tipesurat' => 'Surat Eksternal',
        'tanggalterima' => $this->input->post('tanggalterima'),
        'tanggalsurat' => $this->input->post('tanggalsurat'),
        'asalsurat' => $this->input->post('asalsurat'),
        'perihal' => $this->input->post('perihal'),
        'filesurat' => $this->surat->data('file_name')

      );


      $this->registersuratmodel->tambahrsm($data);

      $iddetail = $this->registersuratmodel->getid();
      $insert = array(
        'kodedrsm' => $iddetail,
        'idsm' => $this->input->post('idrsm'),
        'tujuansurat' => $this->input->post('tujuansurat')

      );

      $this->registersuratmodel->simpantujuansurat($insert);
      $from_email = "youremail@gmail.com";
      $idsm = $this->input->post('idrsm');
      $idtujuan = $this->input->post('tujuansurat');
      $emailtujuan = $this->registersuratmodel->getemail($idsm, $idtujuan);
      $data['email'] = $this->registersuratmodel->getemail($idsm, $idtujuan);
      $isi = $this->load->view('template/email', $data, true);


         $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => 'yourpassword',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
        );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

         foreach ($emailtujuan as $e) {
           if ($e['email']) {

             $this->email->from($from_email, 'E-Office Universitas Abdurrab');
             $this->email->to($e['email']);
             $this->email->subject('Surat Masuk Baru');
             $this->email->message($isi);
             if($this->email->send()) {
               $this->session->set_flashdata('notif',
               '
               <div class="col-md-3"></div>
               <div class="col-md-4">
               <div class="alert alert-success" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               <strong>Notifikasi email telah terkirim kepada penerima surat.</strong>
               </div>
               </div>
               <div class="col-md-3"></div>
               '
             );
              } else {
             // show_error($this->email->print_debugger());
                $this->session->set_flashdata('notif',
                '
                <div class="col-md-3"></div>
                <div class="col-md-7">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Notifikasi email belum terkirim kepada penerima surat. Silahkan periksa koneksi jaringan internet Anda.</strong>
                </div>
                </div>
                <div class="col-md-3"></div>
                '
                );
              }

           }

      }
      redirect('operator/registersurat');
    }
  }

  function detailrsm($id){
    $data['rsm'] = $this->registersuratmodel->detailrsm($id);
    $data['nama'] = $this->session->userdata('nama');
    $data['level'] = $this->session->userdata('level');
    $nip = $this->session->userdata('nip');
    $data['nd'] = $this->registersuratmodel->getnd($nip);
    $data['td'] = $this->registersuratmodel->getd($nip);

    $this->load->view('operator/rsm/detailrsm', $data);
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

}
