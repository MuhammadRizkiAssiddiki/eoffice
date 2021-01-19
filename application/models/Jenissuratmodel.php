<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenissuratmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function tampiljs(){
    $this->db->select('*');
    $this->db->from('jenissurat');

    return $this->db->get()->result();
  }
  function tambahjs($data){
    $this->db->insert('jenissurat', $data);
  }
  function editjs($id, $data){
    $this->db->where('idjenis', $id);
    $this->db->update('jenissurat', $data);
  }
  function hapusjs($id){
    return $this->db->delete('jenissurat', array('idjenis' => $id));
  }

}
