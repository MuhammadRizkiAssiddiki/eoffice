<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registersuratmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();


  }

  function tampilrsm(){
    $this->db->select('*');
    $this->db->from('suratinternal, sifatsurat, jenissurat');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.tipesurat', 'Surat Eksternal');

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

  function getid(){
    $q = $this->db->query("SELECT MAX(RIGHT(kodedrsm,4)) AS kd_max FROM detailrsm WHERE DATE(tanggal)=CURDATE()");
    $kd = "";
    if($q->num_rows()>0){
        foreach($q->result() as $k){
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%04s", $tmp);
        }
    }else{
        $kd = "0001";
    }
    date_default_timezone_set('Asia/Jakarta');
    return "TS" . "-".date('dmy')."-".$kd;
  }

  function getkode(){
    $q = $this->db->query("SELECT MAX(RIGHT(idsi,4)) AS kd_max FROM suratinternal WHERE DATE(tanggalinput)=CURDATE()");
    $kd = "";
    if($q->num_rows()>0){
        foreach($q->result() as $k){
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%04s", $tmp);
        }
    }else{
        $kd = "0001";
    }
    date_default_timezone_set('Asia/Jakarta');
    return "SM" . "-".date('dmy')."-".$kd;
  }

  function tambahrsm($data){
    $this->db->insert('suratinternal', $data);
  }

  function simpantujuansurat($insert){
    $this->db->insert('detailrsm', $insert);
  }

  function getemail($idsm, $idtujuan){
    $this->db->select('email, nama, asalsurat');
    $this->db->from('suratinternal, detailrsm, jabatanpegawai, pegawai');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('detailrsm.idsm = suratinternal.idsi');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('detailrsm.idsm', $idsm);
    $this->db->where('detailrsm.tujuansurat', $idtujuan);

    return $this->db->get()->result_array();
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

  function detailrsm($id){
    $this->db->select('*');
    $this->db->from('suratinternal, detailrsm,sifatsurat, jenissurat, jabatanpegawai, jabatan, pegawai');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.idsi = detailrsm.idsm');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('idsi', $id);

    return $this->db->get()->result();
  }

  function dlrsm($id){
    $this->db->select('*');
    $this->db->from('registersm, sifatsurat, jenissurat');
    $this->db->where('registersm.idjenis = jenissurat.idjenis');
    $this->db->where('registersm.idsifat = sifatsurat.idsifat');
    $this->db->where('idsm', $id);

    return $this->db->get()->result_array();
  }

}
