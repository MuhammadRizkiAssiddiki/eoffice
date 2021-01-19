<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasukmodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();


  }

  function tampilsm($user){
    $this->db->select('*');
    $this->db->from('suratinternal, detailrsm, sifatsurat, jenissurat, jabatanpegawai');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.idsi = detailrsm.idsm');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip', $user);
    $this->db->order_by('suratinternal.statusbaca', 'ASC');
    $this->db->order_by('suratinternal.idsi', 'ASC');

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

  function detailsm($id, $nip){
    $this->db->select('*');
    $this->db->from('suratinternal, detailrsm,sifatsurat, jenissurat, jabatanpegawai, pegawai, jabatan');
    $this->db->where('suratinternal.idjenis = jenissurat.idjenis');
    $this->db->where('suratinternal.idsifat = sifatsurat.idsifat');
    $this->db->where('suratinternal.idsi = detailrsm.idsm');
    $this->db->where('detailrsm.tujuansurat = jabatanpegawai.idjp');
    $this->db->where('jabatanpegawai.nip = pegawai.nip');
    $this->db->where('jabatanpegawai.idjabatan = jabatan.idjabatan');
    $this->db->where('idsi', $id);
    $this->db->where('jabatanpegawai.nip', $nip);

    return $this->db->get()->result();
  }

  function cekstatus($id){
    $this->db->select('statusbaca');
    $this->db->from('suratinternal');
    $this->db->where('idsi', $id);

    return $this->db->get()->result();
  }

  function ubahstatus($id, $baca){
    $this->db->set('statusbaca', $baca);
    $this->db->where('idsi', $id);
    $this->db->update('suratinternal');
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
                             disposisi.parent = '$id'
                             GROUP BY disposisi.iddisposisi");
    return $hasil->result();
  }

  function totaldisposisi($id){
    $hasil=$this->db->query("SELECT * FROM disposisi, kalimatdisposisi, jabatanpegawai, pegawai, jabatan
                             WHERE
                             disposisi.isidisposisi = kalimatdisposisi.idkd AND
                             disposisi.tujuandisposisi = jabatanpegawai.idjp AND
                             jabatanpegawai.nip = pegawai.nip AND
                             jabatanpegawai.idjabatan = jabatan.idjabatan AND
                             disposisi.idsm = '$id'
                             GROUP BY disposisi.iddisposisi");
    return $hasil->num_rows();
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
