<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalimatdisposisimodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  function tampilkd(){
    $this->db->select('*');
    $this->db->from('kalimatdisposisi');

    return $this->db->get()->result();
  }
  function tambahkd($data){
    $this->db->insert('kalimatdisposisi', $data);
  }
  function editkd($id, $data){
    $this->db->where('idkd', $id);
    $this->db->update('kalimatdisposisi', $data);
  }
  function hapuskd($id){
    return $this->db->delete('kalimatdisposisi', array('idkd' => $id));
  }

}
