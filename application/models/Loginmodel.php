<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Loginmodel extends CI_Model
{

  function __construct()
  {
  }

  public function cekuser($username, $password)
  {
    $query = $this->db->query("SELECT pegawai.nip, pegawai.nama, pegawai.password, jabatanpegawai.idjp, jabatan.levelakses, jabatan.jabatan, unitkerja.unitkerja
		FROM pegawai, jabatanpegawai, unitkerja, jabatan
		where pegawai.nip = jabatanpegawai.nip
		AND pegawai.idunitkerja = unitkerja.idunitkerja
		AND jabatanpegawai.idjabatan = jabatan.idjabatan
		AND pegawai.nip = '$username'
		AND pegawai.password = '$password'");

    return $query;
  }
  public function cek_user($data){
    $this->db->select('*');
    $where = "pegawai.nip = jabatanpegawai.nip
		          AND pegawai.idunitkerja = unitkerja.idunitkerja
		          AND jabatanpegawai.idjabatan = jabatan.idjabatan";
    $this->db->where($where);
    $this->db->where($data);

    return $this->db->get()->result();
  }
}


 ?>
