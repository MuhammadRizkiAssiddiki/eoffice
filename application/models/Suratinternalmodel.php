<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratinternalmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();


  }

  function tampilsi(){
    $this->db->select('*');
    $this->db->from('suratinternal, sifatsurat, jenissurat');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.tipesurat', 'Surat Internal');

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

  function tambahsi($data){
    $this->db->insert('suratinternal', $data);
  }



  function detailsi($id){
    $this->db->select('*');
    $this->db->from('suratinternal, sifatsurat, jenissurat');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('idsi', $id);

    return $this->db->get()->result();
  }

  function asalsurat($id){
    $this->db->select('asalsurat');
    $this->db->from('suratinternal');
    $this->db->where('idsi', $id);
  }

  function gettujuan($id){
    // $jp = "SELECT tujuansurat from detailrsm where idsm ='$id'";
    // $this->db->select('*');
    // $this->db->from('jabatanpegawai, jabatan, pegawai');
    // $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    // $this->db->where('jabatanpegawai.nip = pegawai.nip');
    // $this->db->where_not_in('idjp', $jp);
    $hasil=$this->db->query("SELECT * FROM jabatanpegawai, pegawai, jabatan
                             WHERE
                             jabatanpegawai.nip = pegawai.nip AND
                             jabatanpegawai.idjabatan = jabatan.idjabatan AND
                             jabatanpegawai.idjp NOT IN(SELECT tujuansurat From
                             detailrsm where idsm ='$id')");
    return $hasil->result();

    //return $this->db->get()->result();
  }

  function getts($id){
    $hasil=$this->db->query("SELECT * FROM detailrsm, jabatanpegawai, pegawai, jabatan
                             WHERE
                             detailrsm.tujuansurat = jabatanpegawai.idjp AND
                             jabatanpegawai.nip = pegawai.nip AND
                             jabatanpegawai.idjabatan = jabatan.idjabatan AND
                             detailrsm.idsm = '$id'");
    return $hasil->result();
  }
  function simpantujuansurat($data){
    $this->db->insert('detailrsm', $data);
  }

  function getemail($idsm, $idtujuan){
    $this->db->select('email, nama');
    $this->db->from('detailrsm, jabatanpegawai, pegawai');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('detailrsm.idsm', $idsm);
    $this->db->where('detailrsm.tujuansurat', $idtujuan);

    return $this->db->get()->result_array();
  }

  function setemail($idtujuan){
    $this->db->select('email, nama');
    $this->db->from('jabatanpegawai, pegawai');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('jabatanpegawai.idjp', $idtujuan);

    return $this->db->get()->result_array();
  }
  function setnama($emailtujuan){
    $this->db->select('nama');
    $this->db->from('pegawai');
    $this->db->where('email', $emailtujuan);

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

  function dlsi($id){
    $this->db->select('*');
    $this->db->from('suratinternal, sifatsurat, jenissurat');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('idsi', $id);

    return $this->db->get()->result_array();
  }


}
