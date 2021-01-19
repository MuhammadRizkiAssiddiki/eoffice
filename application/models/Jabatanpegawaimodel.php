<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatanpegawaimodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function tampiljp(){
    $this->db->select('*');
    $this->db->from('jabatanpegawai, jabatan, pegawai, unitkerja');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('jabatan.idunitkerja = unitkerja.idunitkerja');

    return $this->db->get()->result();
  }
  function getjabatan(){
    $this->db->select('*');
    $this->db->from('jabatan, unitkerja');
    $this->db->where('jabatan.idunitkerja = unitkerja.idunitkerja');

    return $this->db->get()->result();
  }
  function getpegawai(){
    $this->db->select('*');
    $this->db->from('pegawai');

    return $this->db->get()->result();
  }
  function tambahjp($data){
    $this->db->insert('jabatanpegawai', $data);
  }
  function editjp($id, $data){
    $this->db->where('idjp', $id);
    $this->db->update('jabatanpegawai', $data);
  }
  function hapusjp($id){
    return $this->db->delete('jabatanpegawai', array('idjp' => $id));
  }

}
