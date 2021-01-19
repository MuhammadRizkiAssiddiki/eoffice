<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	 public function __construct()
	 {
		 parent::__construct();
		 $this->load->model('disposisimodel');
		 $this->load->model('homemodel');

	 }
	public function index()
	{
		$user = $this->session->userdata('idjp');
    $nip = $this->session->userdata('nip');
		$ski = $this->session->userdata('jabatan');
    $data['level'] = $this->session->userdata('level');
    $data['nama'] = $this->session->userdata('nama');
    $data['notif'] = $this->disposisimodel->getnotif($nip);
    $data['total'] = $this->disposisimodel->gettotal($nip);

    $data['nd'] = $this->disposisimodel->getnd($nip);
    $data['td'] = $this->disposisimodel->getd($nip);

		$data['bulan'] = $this->homemodel->getbulan($nip);
		$data['jumlah'] = $this->homemodel->getjumlah($nip);

		$data['bulansm'] = $this->homemodel->getbulansm($nip);
		$data['jumlahsm'] = $this->homemodel->getjumlahsm($nip);

		$data['bulansk'] = $this->homemodel->getbulansk($nip);
		$data['jumlahsk'] = $this->homemodel->getjumlahsk($user);

		$data['bulanski'] = $this->homemodel->getbulanski($ski);
		$data['jumlahski'] = $this->homemodel->getjumlahski($ski);

		$data['totalse'] = $this->homemodel->gettotalse();
		$data['totalsi'] = $this->homemodel->gettotalsi();
		$data['totalsk'] = $this->homemodel->gettotalsk();
		$this->load->view('index', $data);
	}
}
