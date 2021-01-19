<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

function __construct()
{
	parent::__construct();
	$this->load->helper('form');
	$this->load->library('session');
  $this->load->model('loginmodel'); // load loginmodel



}
public function index($error = NULL)
{
	$data = array(
					'error' => $error
			);
	$this->load->view('login', $data);
}

public function validasi() {
	 // $data = array('nip' => $this->input->post('username', TRUE),
	 				// 'password' => ($this->input->post('password', TRUE))
		// );
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $login = $this->loginmodel->cekuser($username, $password);

	//$hasil = $this->loginmodel->cek_user($data);
	if ($login->num_rows() == 1) {
		foreach ($login->result() as $sess) {
			$sess_data['nip'] = $sess->nip;
			$sess_data['idjp'] = $sess->idjp;
			$sess_data['level'] = $sess->levelakses;
			$sess_data['nama'] = $sess->nama;
			$sess_data['jabatan'] = $sess->jabatan;
			$sess_data['password'] = $sess->password;

			$this->session->set_userdata($sess_data);
		}
		if ($this->session->userdata('level')=='administrator') {
			redirect('administrator/pegawai');

		}
		elseif ($this->session->userdata('level')=='pimpinan') {
			redirect('pimpinan/suratmasuk');
		}
		elseif ($this->session->userdata('level')=='operator') {
			redirect('operator/registersurat');
		}
		elseif ($this->session->userdata('level')=='staf') {
			redirect('staf/disposisi');
		}
		else {
			$error = 'Error Jancuk';
			$this->index($error);
		}

	}
	else {

		$error = 'Username atau Password salah';
		$this->index($error);
	}
}

public function logout()
{
	$this->session->unset_userdata('nip');
	$this->session->unset_userdata('level');
	session_destroy();
	redirect('login');
}

}

?>
