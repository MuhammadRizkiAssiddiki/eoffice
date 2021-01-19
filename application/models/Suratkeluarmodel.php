<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluarmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();


  }

  function tampilsk(){
    $this->db->select('*');
    $this->db->from('suratkeluar, sifatsurat, jenissurat');
    $this->db->where('suratkeluar.idjenis = jenissurat.idjenis');
    $this->db->where('suratkeluar.idsifat = sifatsurat.idsifat');

    return $this->db->get()->result();
  }

  function getjp(){
    $this->db->select('*');
    $this->db->from('jabatanpegawai, jabatan, pegawai');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');

    return $this->db->get()->result();
  }
  function getss(){
    $this->db->select('*');
    $this->db->from('sifatsurat');

    return $this->db->get()->result();
  }
  function getjs(){
    $this->db->select('*');
    $this->db->from('jenissurat');

    return $this->db->get()->result();
  }

  function tambahsk($data){
    $this->db->insert('suratkeluar', $data);
  }

  function detailsk($id){
    $this->db->select('*');
    $this->db->from('suratkeluar, sifatsurat, jenissurat, jabatanpegawai, pegawai, jabatan');
    $this->db->where('suratkeluar.idjenis = jenissurat.idjenis');
    $this->db->where('suratkeluar.idsifat = sifatsurat.idsifat');
    $this->db->where('suratkeluar.pj = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('idsk', $id);

    return $this->db->get()->result();
  }
  function getd($user){
    $this->db->select('*');
    $this->db->from('disposisi, jabatanpegawai');
    $this->db->where('disposisi.tujuandisposisi = jabatanpegawai.idjp');
    $this->db->where('statusdisposisi', 'Belum Dibaca');
    $this->db->where('jabatanpegawai.nip', $user);
    $this->db->order_by('disposisi.tanggaldisposisi', 'DESC');

    return $this->db->get()->num_rows();
  }

  function getnd($user){
    $this->db->select('*');
    $this->db->from('disposisi, jabatanpegawai, kalimatdisposisi');
    $this->db->where('disposisi.tujuandisposisi = jabatanpegawai.idjp');
    $this->db->where('disposisi.isidisposisi = kalimatdisposisi.idkd');
    $this->db->where('statusdisposisi', 'Belum Dibaca');
    $this->db->where('jabatanpegawai.nip', $user);
    $this->db->order_by('disposisi.tanggaldisposisi', 'DESC');
    $this->db->limit(2);

    return $this->db->get()->result();
  }

  function dlsk($id){
    $this->db->select('*');
    $this->db->from('suratkeluar, sifatsurat, jenissurat');
    $this->db->where('suratkeluar.idjenis = jenissurat.idjenis');
    $this->db->where('suratkeluar.idsifat = sifatsurat.idsifat');
    $this->db->where('idsm', $id);

    return $this->db->get()->result_array();
  }

  function editss($id, $data){
    $this->db->where('idsifat', $id);
    $this->db->update('sifatsurat', $data);
  }
  function hapusss($id){
    return $this->db->delete('sifatsurat', array('idsifat' => $id));
  }

}
