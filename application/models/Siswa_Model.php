<?php

class Siswa_Model extends CI_Model
{
  private $table = 'siswa';

  public function getSiswa()
  {
    return $this->db->query("SELECT `siswa`.`nis`, `siswa`.`nama`, `kelas`.`nama_kelas` FROM `siswa` INNER JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`")->result_array();
  }

  public function getSiswaByNIS($nis)
  {
    return $this->db->get_where($this->table, ['nis' => $nis])->row_array();
  }

  public function addSiswa($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editSiswa($data)
  {
    return $this->db->update($this->table, $data, ['nis' => $data['nis']]);
  }

  public function getSiswaByKelas($id_kelas)
  {
    return $this->db->query("SELECT `siswa`.`nis`, `kelas`.`id_kelas`, `kelas`.`nama_kelas`, SUBSTRING_INDEX(`siswa`.`nama`, ' ', 2) AS nama, `siswa`.`jenis_kelamin` FROM `siswa` INNER JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas` WHERE `siswa`.`id_kelas` = '$id_kelas'")->result_array();
  }

  function jumlah_data()
  {
    return $this->db->get($this->table)->num_rows();
  }

  public function laporSiswa($data)
  {
    return $this->db->insert('siswa_bermasalah', $data);
  }

  public function getSiswaBermasalah($nip)
  {
    return $this->db->query("SELECT siswa_bermasalah.id_siswa_bermasalah, siswa.nama, siswa.nis FROM siswa_bermasalah INNER JOIN siswa ON siswa_bermasalah.nis = siswa.nis WHERE siswa_bermasalah.status = '0' AND siswa_bermasalah.nip = '$nip'")->result_array();
  }

  public function getSiswaBermasalahBK()
  {
    return $this->db->query("SELECT siswa_bermasalah.id_siswa_bermasalah, siswa.nama, siswa.nis FROM siswa_bermasalah INNER JOIN siswa ON siswa_bermasalah.nis = siswa.nis WHERE siswa_bermasalah.status = '0'")->result_array();
  }

  public function getSiswaBermasalahById($id)
  {
    return $this->db->query("SELECT siswa.nis, siswa.nama, kelas.nama_kelas, siswa_bermasalah.keterangan FROM siswa_bermasalah INNER JOIN siswa ON siswa_bermasalah.nis = siswa.nis INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa_bermasalah.id_siswa_bermasalah = '$id'")->row_array();
  }

  public function getSiswaBermasalahByIdBK($id)
  {
    return $this->db->query("SELECT siswa_bermasalah.id_siswa_bermasalah, siswa.nis, siswa.nama, kelas.nama_kelas, siswa_bermasalah.keterangan, pengajar.nama AS nama_guru FROM siswa_bermasalah INNER JOIN siswa ON siswa_bermasalah.nis = siswa.nis INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN pengajar ON siswa_bermasalah.nip = pengajar.nip WHERE siswa_bermasalah.id_siswa_bermasalah = '$id'")->row_array();
  }

  public function binaSiswa($data)
  {
    return $this->db->insert('siswa_binaan', $data);
  }

  public function getSiswaBinaan($nip)
  {
    return $this->db->query("SELECT siswa.nis, siswa.nama, siswa_binaan.tanggal, siswa_binaan.id_siswa_binaan FROM siswa_binaan INNER JOIN siswa_bermasalah ON siswa_binaan.id_siswa_bermasalah = siswa_bermasalah.id_siswa_bermasalah INNER JOIN siswa ON siswa_bermasalah.nis = siswa.nis")->result_array();
  }

  public function getSiswaBinaanById($id)
  {
    return $this->db->query("SELECT siswa.nis, siswa.nama, siswa_binaan.tanggal, siswa_binaan.keterangan, pengajar.nama AS nama_guru, kelas.nama_kelas FROM siswa_binaan INNER JOIN siswa_bermasalah ON siswa_binaan.id_siswa_bermasalah = siswa_bermasalah.id_siswa_bermasalah INNER JOIN siswa ON siswa_bermasalah.nis = siswa.nis INNER JOIN pengajar ON siswa_binaan.nip = pengajar.nip INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa_binaan.id_siswa_binaan = '$id'")->row_array();
  }
}
