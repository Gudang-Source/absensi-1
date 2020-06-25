<?php

class Jadwal_Pelajaran_Model extends CI_Model
{
  private $table = 'jadwal_pelajaran';

  public function getJadwalPelajaran()
  {
    return $this->db->query("SELECT `jadwal_pelajaran`.`id_jadwal_pelajaran`, `mata_pelajaran`.`nama_pelajaran`, `pengajar`.`nama`, `kelas`.`nama_kelas` FROM `jadwal_pelajaran` INNER JOIN `pengajar` ON `jadwal_pelajaran`.`nip` = `pengajar`.`nip` INNER JOIN `kelas` ON `jadwal_pelajaran`.`id_kelas` = `kelas`.`id_kelas` INNER JOIN `mata_pelajaran` ON `jadwal_pelajaran`.`id_pelajaran` = `mata_pelajaran`.`id_pelajaran`")->result_array();
  }

  public function addJadwalPelajaranDetail($data)
  {
    return $this->db->query("CALL insert_jadwal_pelajaran_detail('" . $data['id_jadwal_pelajaran'] . "', '" . $data['hari'] . "', '" . $data['jumlah_jam'] . "', '" . $data['jam_mulai'] . "')");
  }

  public function getJadwalPelajaranDetailById($id_jadwal_pelajaran_detail)
  {
    return $this->db->get_where('jadwal_pelajaran_detail', ['id_jadwal_pelajaran_detail' => $id_jadwal_pelajaran_detail])->row_array();
  }

  public function editJadwalPelajaranDetail($data, $id)
  {
    return $this->db->update('jadwal_pelajaran_detail', $data, ['id_jadwal_pelajaran_detail' => $id]);
  }

  public function getJadwalPelajaranById($id_jadwal_pelajaran_detail)
  {
    return $this->db->query("SELECT `jadwal_pelajaran`.`id_jadwal_pelajaran`, `jadwal_pelajaran`.`id_pelajaran`, `jadwal_pelajaran`.`nip`, `jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail`, `kelas`.`id_kelas`, `jadwal_pelajaran_detail`.`jam_mulai`, get_jam_selesai(`jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail`) AS `jam_selesai`,  `jadwal_pelajaran_detail`.`jumlah_jam`, `mata_pelajaran`.`nama_pelajaran` FROM `jadwal_pelajaran` INNER JOIN `kelas` ON `jadwal_pelajaran`.`id_kelas` = `kelas`.`id_kelas` INNER JOIN `jadwal_pelajaran_detail` ON `jadwal_pelajaran`.`id_jadwal_pelajaran` = `jadwal_pelajaran_detail`.`id_jadwal_pelajaran` INNER JOIN `mata_pelajaran` ON `jadwal_pelajaran`.`id_pelajaran` = `mata_pelajaran`.`id_pelajaran` WHERE `jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail` = '$id_jadwal_pelajaran_detail'")->row_array();
  }

  public function addJadwalPelajaran($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editJadwalPelajaran($data)
  {
    return $this->db->update($this->table, $data, ['id_jadwal_pelajaran' => $data['id_jadwal_pelajaran']]);
  }

  public function getJadwalHariIni($nip)
  {
    date_default_timezone_set('Asia/Jakarta');
    $hari = date('w');
    return $this->db->query("SELECT kelas.id_kelas, `jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail`, `kelas`.`nama_kelas`, `mata_pelajaran`.`nama_pelajaran`, `jadwal_pelajaran_detail`.`jam_mulai`, get_jam_selesai(`jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail`) AS `jam_selesai` FROM `jadwal_pelajaran` 
    INNER JOIN `kelas` ON `jadwal_pelajaran`.`id_kelas` = `kelas`.`id_kelas` INNER JOIN `mata_pelajaran` ON `jadwal_pelajaran`.`id_pelajaran` = `mata_pelajaran`.`id_pelajaran` 
    INNER JOIN `jadwal_pelajaran_detail` ON `jadwal_pelajaran`.`id_jadwal_pelajaran` = `jadwal_pelajaran_detail`.`id_jadwal_pelajaran` 
    WHERE `jadwal_pelajaran`.`nip` = '$nip' AND `jadwal_pelajaran_detail`.`hari` = '$hari'")->result_array();
  }

  public function getJadwalSekarang($id_jadwal_pelajaran_detail)
  {
    return $this->db->query("SELECT `jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail`, `kelas`.`nama_kelas`, `mata_pelajaran`.`nama_pelajaran` FROM `jadwal_pelajaran` INNER JOIN `kelas` ON `jadwal_pelajaran`.`id_kelas` = `kelas`.`id_kelas` INNER JOIN `mata_pelajaran` ON `jadwal_pelajaran`.`id_pelajaran` = `mata_pelajaran`.`id_pelajaran` INNER JOIN `jadwal_pelajaran_detail` ON `jadwal_pelajaran`.`id_jadwal_pelajaran` = `jadwal_pelajaran_detail`.`id_jadwal_pelajaran` WHERE `jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail` = '$id_jadwal_pelajaran_detail'")->row_array();
  }

  public function getKelasAjar($nip)
  {
    return $this->db->query("SELECT kelas.`id_kelas`, kelas.`nama_kelas`, pengajar.nama FROM jadwal_pelajaran 
    INNER JOIN kelas ON jadwal_pelajaran.id_kelas = kelas.id_kelas
    INNER JOIN pengajar ON jadwal_pelajaran.nip = pengajar.nip WHERE jadwal_pelajaran.nip = '$nip'")->result_array();
  }

  public function getJadwalByKelasAndByNIP($nip, $id_kelas)
  {
    return $this->db->query("SELECT `jadwal_pelajaran`.`id_jadwal_pelajaran` FROM `jadwal_pelajaran` WHERE `jadwal_pelajaran`.`nip` = '$nip' AND `jadwal_pelajaran`.`id_kelas` = '$id_kelas'")->row_array();
  }

  public function getJadwalPelajaranDetail()
  {
    return $this->db->query("SELECT jadwal_pelajaran_detail.id_jadwal_pelajaran_detail, SUBSTRING_INDEX(pengajar.nama, ' ', 2) AS nama, kelas.nama_kelas, mata_pelajaran.nama_pelajaran, jadwal_pelajaran_detail.hari FROM jadwal_pelajaran_detail INNER JOIN jadwal_pelajaran ON jadwal_pelajaran_detail.id_jadwal_pelajaran = jadwal_pelajaran.id_jadwal_pelajaran INNER JOIN mata_pelajaran ON jadwal_pelajaran.id_pelajaran = mata_pelajaran.id_pelajaran INNER JOIN pengajar ON jadwal_pelajaran.nip = pengajar.nip INNER JOIN kelas ON jadwal_pelajaran.id_kelas = kelas.id_kelas")->result_array();
  }
}
