<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawaimodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function tampilpegawai(){
    $this->db->select('*');
    $this->db->from('pegawai, unitkerja');
    $this->db->where('pegawai.idunitkerja = unitkerja.idunitkerja');

    return $this->db->get()->result();
  }
  function getuk(){
    $this->db->select('*');
    $this->db->from('unitkerja');

    return $this->db->get()->result();
  }
  function tambahpegawai($data){
    $this->db->insert('pegawai', $data);
  }

  function detailpegawai($id){
    $this->db->select('*');
    $this->db->from('pegawai, unitkerja');
    $this->db->where('pegawai.idunitkerja = unitkerja.idunitkerja');
    $this->db->where('nip', $id);

    return $this->db->get()->result();
  }
  function editpegawai($id, $data){
    $this->db->where('nip', $id);
    $this->db->update('pegawai', $data);
  }
  function hapuspegawai($id){
    return $this->db->delete('pegawai', array('nip' => $id));
  }

}
