<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatanmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function tampiljabatan(){
    $this->db->select('jabatan.idjabatan, jabatan.idunitkerja, unitkerja.unitkerja, jabatan.jabatan, jabatan.levelakses');
    $this->db->where('jabatan.idunitkerja = unitkerja.idunitkerja');
    $this->db->from('jabatan, unitkerja');
    $this->db->group_by('jabatan.idjabatan');

    return $this->db->get()->result();
  }
  function getuk(){
    $this->db->select('*');
    $this->db->from('unitkerja');

    return $this->db->get()->result();
  }
  function tambahjabatan($data){
    $this->db->insert('jabatan', $data);
  }
  function editjabatan($id, $data){
    $this->db->where('idjabatan', $id);
    $this->db->update('jabatan', $data);
  }
  function hapusjabatan($id){
    return $this->db->delete('jabatan', array('idjabatan' => $id));
  }

}
