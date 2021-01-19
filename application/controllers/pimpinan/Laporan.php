<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('laporanmodel');
  }

  function index()
  {
    if (isset($_GET['filter']) && ! empty ($_GET['filter'])) {
      $filter = $_GET['filter'];

      if ($filter == '1') {
        $tanggal = $_GET['tanggal'];

        $ket = 'Data Laporan Surat Masuk Tanggal '.date('d-m-y', strtotime($tanggal));
        $urlcetak = 'laporan/cetak?filter=1&tahun='.$tanggal;
        $laporan = $this->laporanmodel->laptanggal($tanggal);
      } else if($filter == '2') {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $namabulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        $ket = 'Data Laporan Surat Masuk Bulan '.$namabulan[$bulan].' '.$tahun;
        $urlcetak = 'laporan/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
        $laporan = $this->laporanmodel->lapbulan($bulan, $tahun);
      } else{
        $tahun = $_GET['tahun'];

        $ket = 'Data Laporan Surat Masuk Tahun '.$tahun;
        $urlcetak = 'laporan/cetak?filter=3&tahun='.$tahun;
        $laporan = $this->laporanmodel->laptahun($tahun);
      }
    } else {
      $ket = 'Data Laporan Surat Masuk';
      $urlcetak = 'laporan/cetak';
      $laporan = $this->laporanmodel->semualaporan();
    }
    $data['ket'] = $ket;
    $data['urlcetak'] = base_url($urlcetak);
    $data['laporan'] = $laporan;
    $data['opsitahun'] =$this->laporanmodel->optiontahun();
    $this->load->view('pimpinan/laporansm', $data);

  }

  function cetak(){
    if (isset($_GET['filter']) && ! empty ($_GET['filter'])) {
      $filter = $_GET['filter'];

      if ($filter == '1') {
        $tanggal = $_GET['tanggal'];

        $ket = 'Data Laporan Surat Masuk Tanggal '.date('d-m-y', strtotime($tanggal));
        $laporan = $this->laporanmodel->laptanggal($tanggal);
      } else if($filter == '2') {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $namabulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        $ket = 'Data Laporan Surat Masuk Bulan '.$namabulan[$bulan].' '.$tahun;
        $laporan = $this->laporanmodel->lapbulan($bulan, $tahun);
      } else{
        $tahun = $_GET['tahun'];

        $ket = 'Data Laporan Surat Masuk Tahun '.$tahun;
        $laporan = $this->laporanmodel->laptahun($tahun);
      }
    } else {
      $ket = 'Data Laporan Surat Masuk';
      $laporan = $this->laporanmodel->semualaporan();
    }
    $data['ket'] = $ket;
    $data['laporan'] = $laporan;

    ob_start();
    $this->load->view('pimpinan/cetak', $data);
    $html = ob_get_contents();
    ob_end_clean();

    require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P', 'A4', 'en' );
    $pdf->WriteHTML($html);
    $pdf->Output('Laporan Surat Masuk.pdf', 'D');

    //ntar kulanjutin kalau mood eah
  }

}
