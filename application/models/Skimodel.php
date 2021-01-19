<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skimodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();


  }

  function tampilski($user){
    $this->db->select('*');
    $this->db->from('suratinternal, sifatsurat, jenissurat');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->like('suratinternal.asalsurat', $user);
    $this->db->order_by('suratinternal.idsi', 'ASC');

    return $this->db->get()->result();
  }

  function gettujuan($id){
    $this->db->select('*');
    $this->db->from('detailrsm, jabatanpegawai, pegawai, jabatan');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('idsm', $id);

    return $this->db->get()->result();
  }

  function gettotal($user){
    $this->db->select('*');
    $this->db->from('suratinternal, detailrsm, sifatsurat, jenissurat, jabatanpegawai');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.idsi = detailrsm.idsm');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip', $user);
    $this->db->where('statusbaca', 'Belum Dibaca');

    return $this->db->get()->num_rows();
  }

  function getnotif($user){
    $this->db->select('*');
    $this->db->from('suratinternal, detailrsm, sifatsurat, jenissurat, jabatanpegawai');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.idsi = detailrsm.idsm');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('statusbaca', 'Belum Dibaca');
    $this->db->where('jabatanpegawai.nip', $user);
    $this->db->order_by('suratinternal.tanggalsurat', 'DESC');
    $this->db->limit(2);

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

  function detailski($id){
    $this->db->select('*');
    $this->db->from('suratinternal,sifatsurat, jenissurat');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('idsi', $id);

    return $this->db->get()->result();
  }



  function dlrsm($id){
    $this->db->select('*');
    $this->db->from('suratkeluar, sifatsurat, jenissurat');
    $this->db->where('suratkeluar.idjenis = jenissurat.idjenis');
    $this->db->where('suratkeluar.idsifat = sifatsurat.idsifat');
    $this->db->where('idsk', $id);

    return $this->db->get()->result_array();
  }



}
