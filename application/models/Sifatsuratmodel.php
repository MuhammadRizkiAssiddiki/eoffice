<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sifatsuratmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function tampilss(){
    $this->db->select('*');
    $this->db->from('sifatsurat');

    return $this->db->get()->result();
  }
  function tambahss($data){
    $this->db->insert('sifatsurat', $data);
  }
  function editss($id, $data){
    $this->db->where('idsifat', $id);
    $this->db->update('sifatsurat', $data);
  }
  function hapusss($id){
    return $this->db->delete('sifatsurat', array('idsifat' => $id));
  }

}
