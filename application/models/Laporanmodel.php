<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  function laptanggal($tanggal){
    $this->db->where('DATE(tanggalsurat)', $date);

    return $this->db->get('suratinternal')->result();
  }

  function lapbulan($bulan, $tahun){
    $this->db->where('MONTH(tanggalsurat)', $bulan);
    $this->db->where('YEAR(tanggalsurat)', $tahun);

    return $this->db->get('suratinternal')->result();
  }

  function laptahun($tahun){
    $this->db->where('YEAR(tanggalsurat)', $tahun);

    return $this->db->get('suratinternal')->result();
  }

  function semualaporan(){
    return $this->db->get('suratinternal')->result();
  }

  function optiontahun(){
    $this->db->select('YEAR(tanggalsurat) AS tahun');
    $this->db->from('suratinternal');
    $this->db->order_by('YEAR(tanggalsurat)');
    $this->db->group_by('YEAR(tanggalsurat)');

    return $this->db->get()->result();
  }

}
