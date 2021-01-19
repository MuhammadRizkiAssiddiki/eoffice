<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homemodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getbulan($user){
    $hasil=$this->db->query("SELECT COUNT(*) AS bulan
                             FROM disposisi, jabatanpegawai
                             WHERE disposisi.tujuandisposisi = jabatanpegawai.idjp
                             AND jabatanpegawai.nip = '$user'
                             AND CONCAT(YEAR(tanggaldisposisi),'/',MONTH(tanggaldisposisi))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                             GROUP BY YEAR(tanggaldisposisi),MONTH(tanggaldisposisi)");
    return $hasil->num_rows();
  }

  function getjumlah($user){
    $this->db->select('*');
    $this->db->from('disposisi, jabatanpegawai');
    $this->db->where('disposisi.tujuandisposisi = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip', $user);
    $this->db->order_by('disposisi.tanggaldisposisi', 'DESC');

    return $this->db->get()->num_rows();
  }

  function getbulansm($user){
    $hasil=$this->db->query("SELECT COUNT(*) AS bulan
                             FROM suratinternal, detailrsm, jabatanpegawai
                             WHERE suratinternal.idsi = detailrsm.idsm
                             AND detailrsm.tujuansurat = jabatanpegawai.idjp
                             AND jabatanpegawai.nip = '$user'
                             AND CONCAT(YEAR(tanggalsurat),'/',MONTH(tanggalsurat))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                             GROUP BY YEAR(tanggalsurat),MONTH(tanggalsurat)");
    return $hasil->num_rows();
  }
  function getjumlahsm($user){
    $this->db->select('*');
    $this->db->from('suratinternal, detailrsm, sifatsurat, jenissurat, jabatanpegawai');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.idsi = detailrsm.idsm');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip', $user);

    return $this->db->get()->num_rows();
  }

  function getbulansk($user){
    $hasil=$this->db->query("SELECT COUNT(*) AS bulan
                             FROM suratkeluar, jabatanpegawai
                             WHERE suratkeluar.pj = jabatanpegawai.idjp
                             AND jabatanpegawai.nip = '$user'
                             AND CONCAT(YEAR(tanggalsurat),'/',MONTH(tanggalsurat))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                             GROUP BY YEAR(tanggalsurat),MONTH(tanggalsurat)");
    return $hasil->num_rows();
  }

  function getjumlahsk($user){
    $this->db->select('*');
    $this->db->from('suratkeluar, sifatsurat, jenissurat, jabatanpegawai');
    $this->db->where('suratkeluar.idjenis = jenissurat.idjenis');
    $this->db->where('suratkeluar.idsifat = sifatsurat.idsifat');
    $this->db->where('suratkeluar.pj = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.idjp', $user);
    $this->db->order_by('suratkeluar.idsk', 'ASC');


    return $this->db->get()->num_rows();
  }

  function getjumlahski($user){
    $this->db->select('*');
    $this->db->from('suratinternal');
    $this->db->like('suratinternal.asalsurat', $user);
    $this->db->order_by('suratinternal.idsi', 'ASC');


    return $this->db->get()->num_rows();
  }

  function getbulanski($user){
    $hasil=$this->db->query("SELECT COUNT(*) AS bulan
                             FROM suratinternal
                             WHERE asalsurat LIKE '%$user%'
                             AND CONCAT(YEAR(tanggalsurat),'/',MONTH(tanggalsurat))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                             GROUP BY YEAR(tanggalsurat),MONTH(tanggalsurat)");
    return $hasil->num_rows();
  }

  function gettotalse(){
    $this->db->select('*');
    $this->db->from('suratinternal');
    $this->db->where('tipesurat', 'Surat Eksternal');

    return $this->db->get()->num_rows();
  }
  function gettotalsi(){
    $this->db->select('*');
    $this->db->from('suratinternal');
    $this->db->where('tipesurat', 'Surat Internal');


    return $this->db->get()->num_rows();
  }
  function gettotalsk(){
    $this->db->select('*');
    $this->db->from('suratkeluar');


    return $this->db->get()->num_rows();
  }

}
