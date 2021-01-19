<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisimodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();


  }

  function tampildsp($user){
    $this->db->select('*');
    $this->db->from('disposisi, kalimatdisposisi');
    $this->db->where('disposisi.isidisposisi = kalimatdisposisi.idkd');
    $this->db->where('disposisi.tujuandisposisi', $user);
    $this->db->order_by('disposisi.statusdisposisi', 'ASC');
    $this->db->order_by('disposisi.iddisposisi', 'DESC');

    return $this->db->get()->result();
  }

  function getjp($nip){
    $this->db->select('*');
    $this->db->from('jabatanpegawai, jabatan, pegawai');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('pegawai.nip !=', $nip);

    return $this->db->get()->result();
  }

  function getkd(){
    $this->db->select('*');
    $this->db->from('kalimatdisposisi');

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

  function totaldisposisi($id){
    $hasil=$this->db->query("SELECT * FROM disposisi, kalimatdisposisi, jabatanpegawai, pegawai, jabatan
                             WHERE
                             disposisi.isidisposisi = kalimatdisposisi.idkd AND
                             disposisi.tujuandisposisi = jabatanpegawai.idjp AND
                             jabatanpegawai.nip = pegawai.nip AND
                             jabatanpegawai.idjabatan = jabatan.idjabatan AND
                             disposisi.parent = '$id'
                             GROUP BY disposisi.iddisposisi");
    return $hasil->num_rows();
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

  function detaildsp($id){
    $this->db->select('*');
    $this->db->from('disposisi, suratinternal, jabatanpegawai, pegawai, jabatan, kalimatdisposisi');
    $this->db->where('disposisi.idsm = suratinternal.idsi');
    $this->db->where('disposisi.tujuandisposisi = jabatanpegawai.idjp');
    $this->db->where('disposisi.isidisposisi = kalimatdisposisi.idkd');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('disposisi.iddisposisi', $id);

    return $this->db->get()->result();
  }

  function cekstatus($id){
    $this->db->select('statusdisposisi');
    $this->db->from('disposisi');
    $this->db->where('iddisposisi', $id);

    return $this->db->get()->result();
  }

  function ubahstatus($id, $baca){
    $this->db->set('statusdisposisi', $baca);
    $this->db->where('iddisposisi', $id);
    $this->db->update('disposisi');
  }

  function dlrsm($id){
    $this->db->select('*');
    $this->db->from('registersm, sifatsurat, jenissurat');
    $this->db->where('registersm.idjenis = jenissurat.idjenis');
    $this->db->where('registersm.idsifat = sifatsurat.idsifat');
    $this->db->where('idsm', $id);

    return $this->db->get()->result_array();
  }

  function tampildisposisi($id){
    $hasil=$this->db->query("SELECT * FROM disposisi, kalimatdisposisi, jabatanpegawai, pegawai, jabatan
                             WHERE disposisi.iddisposisi = detaildisposisi.iddisposisi AND
                             disposisi.isidisposisi = kalimatdisposisi.idkd AND
                             disposisi.tujuandisposisi = jabatanpegawai.idjp AND
                             jabatanpegawai.nip = pegawai.nip AND
                             jabatanpegawai.idjabatan = jabatan.idjabatan AND
                             disposisi.iddisposisi = $id");
    return $hasil->result();
  }

  function getdisposisi($id){
    $hasil=$this->db->query("SELECT * FROM disposisi, kalimatdisposisi, jabatanpegawai, pegawai, jabatan
                             WHERE
                             disposisi.isidisposisi = kalimatdisposisi.idkd AND
                             disposisi.tujuandisposisi = jabatanpegawai.idjp AND
                             jabatanpegawai.nip = pegawai.nip AND
                             jabatanpegawai.idjabatan = jabatan.idjabatan AND
                             disposisi.parent = '$id'");
    return $hasil->result();
  }

  function dapatdisposisi($id){
    $hasil=$this->db->query("SELECT * FROM disposisi, kalimatdisposisi, jabatanpegawai, pegawai, jabatan
                             WHERE
                             disposisi.isidisposisi = kalimatdisposisi.idkd AND
                             disposisi.tujuandisposisi = jabatanpegawai.idjp AND
                             jabatanpegawai.nip = pegawai.nip AND
                             jabatanpegawai.idjabatan = jabatan.idjabatan AND
                             disposisi.parent = '$id'");

    if ($hasil->num_rows()>0) {
      foreach ($hasil->result() as $data) {
				$hsl=array(
					'nama' => $data->nama,
					'jabatan' => $data->jabatan,
					'kalimatdisposisi' => $data->kalimatdisposisi,
					);
			}
    }
    return $hsl;
  }

  function simpandisposisi($data){
    $this->db->insert('disposisi', $data);
  }


}
