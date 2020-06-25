<?php

class Absen_Model extends CI_Model
{
  private $table = 'absen_siswa';

  public function absenSiswa($data)
  {
    return $this->db->insert_batch($this->table, $data);
  }

  public function laporanAbsen($nis, $nip, $d)
  {
    return $this->db->query("SELECT * FROM laporan_absen WHERE tanggal = '$d' AND nis = '$nis' AND nip = '$nip' ORDER BY tanggal")->row_array();
  }

  public function jmlTidakMasuk($keterangan, $nip, $nis, $interval = '7')
  {
    return $this->db->query("SELECT COUNT(*) / jumlah_jam AS jumlah_tidak_masuk, jumlah_jam FROM jml_tidak_masuk
    WHERE keterangan = '$keterangan' AND nip = '$nip'
    AND nis = '$nis'
    AND tanggal BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -$interval DAY) AND CURRENT_DATE()
    GROUP BY tanggal")->result_array();
  }
  
  public function jmlTidakMasukBK($keterangan, $nis, $interval = '7')
  {
    return $this->db->query("SELECT COUNT(*) / jumlah_jam AS jumlah_tidak_masuk, jumlah_jam FROM jml_tidak_masuk
    WHERE keterangan = '$keterangan'
    AND nis = '$nis'
    AND tanggal BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -$interval DAY) AND CURRENT_DATE()
    GROUP BY tanggal")->result_array();
  }

  public function getDataAbsen($nip, $tgl)
  {
    return $this->db->query("SELECT siswa.nis, siswa.nama, kelas.nama_kelas, absen_siswa.tanggal, absen_siswa.keterangan FROM absen_siswa
    INNER JOIN siswa ON absen_siswa.nis = siswa.nis
    INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas
    INNER JOIN jadwal_pelajaran_detail ON absen_siswa.id_jadwal_pelajaran_detail = jadwal_pelajaran_detail.id_jadwal_pelajaran_detail
    INNER JOIN jadwal_pelajaran ON jadwal_pelajaran.id_jadwal_pelajaran = jadwal_pelajaran_detail.id_jadwal_pelajaran
    WHERE jadwal_pelajaran.nip = '$nip'
    AND absen_siswa.tanggal = '$tgl' GROUP BY siswa.nis")->result_array();
  }

  public function editAbsen($data)
  {
    return $this->db->update('absen_siswa', $data, ['nis' => $data['nis'], 'tanggal' => $data['tanggal']]);
  }
}
