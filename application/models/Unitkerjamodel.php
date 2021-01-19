<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unitkerjamodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function tampiluk(){
    $this->db->select('*');
    $this->db->from('unitkerja');

    return $this->db->get()->result();
  }
  function tambahuk($data){
    $this->db->insert('unitkerja', $data);
  }
  function edituk($id, $data){
    $this->db->where('idunitkerja', $id);
    $this->db->update('unitkerja', $data);
  }
  function hapusuk($id){
    return $this->db->delete('unitkerja', array('idunitkerja' => $id));
  }

}
