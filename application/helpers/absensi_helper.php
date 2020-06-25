<?php

function login($data)
{
  $ci = get_instance();
  $ci->load->model('Akun_Model', 'akun');
  if ($row = $ci->akun->getAkunByNIP($data['nip'])) {
    if (password_verify($data['password'], $row['password'])) {

      $ci->session->set_userdata([
        'login' => true,
        'nip' => $row['nip'],
        'hak_akses' => $row['id_hak_akses']
      ]);

      redirect('Guru/index');
    } else {
      $ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password yang anda masukan salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Authentication/login');
    }
  } else {
    $ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">NIP yang anda masukan salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('Authentication/login');
  }
}

function selected_agama($id_agama_row, $id_agama)
{
  if ($id_agama_row == $id_agama) {
    return 'selected';
  }
}

function selected_jurusan($id_jurusan_row, $id_jurusan)
{
  if ($id_jurusan_row == $id_jurusan) {
    return 'selected';
  }
}

function selected_kelas($id_kelas_row, $id_kelas)
{
  if ($id_kelas_row == $id_kelas) {
    return 'selected';
  }
}

function selected_pengajar($id_pengajar_row, $id_pengajar)
{
  if ($id_pengajar_row == $id_pengajar) {
    return 'selected';
  }
}
function selected_pelajaran($id_pelajaran_row, $id_pelajaran)
{
  if ($id_pelajaran_row == $id_pelajaran) {
    return 'selected';
  }
}
function selected_jk($id_jk_row, $id_jk)
{
  if ($id_jk_row == $id_jk) {
    return 'selected';
  }
}

function jadwal_sekarang($data)
{
  date_default_timezone_set('Asia/Jakarta');
  foreach ($data as $row) {
    $jam_mulai = strtotime(date('Y-m-d ') . $row['jam_mulai']);
    $jam_selesai = strtotime(date('Y-m-d ') . $row['jam_selesai']);
    if (time() >= $jam_mulai and time() <= $jam_selesai) {
      return $row['id_jadwal_pelajaran_detail'];
    }
  }
}

function selected_id_jadwal_pelajaran($id_row, $id)
{
  if ($id_row == $id) {
    return 'selected';
  }
}

function selected_hari($id_row, $id)
{
  if ($id_row == $id) {
    return 'selected';
  }
}

function cek_absen_guru($nis, $nip, $d)
{
  $ci = get_instance();
  $ci->load->model('Absen_Model', 'absen');
  $absen = $ci->absen->laporanAbsen($nis, $nip, $d);
  if ($absen) {
    echo '<td style="width: 50px;"><p class="text-danger m-0 text-center">' . $absen['keterangan'] . '</p></td>';
  } else {
    echo '<td style="width: 50px;"><p class="text-success m-0 text-center">H</p></td>';
  }
}

function value_absen($nis, $nip, $d)
{
  $ci = get_instance();
  $ci->load->model('Absen_Model', 'absen');
  $absen = $ci->absen->laporanAbsen($nis, $nip, $d);
  if ($absen) {
    echo $absen['keterangan'];
  } else {
    echo 'H';
  }
}

function cek_absen($nis, $nip, $d)
{
  $ci = get_instance();
  $ci->load->model('Absen_Model', 'absen');
  $absen = $ci->absen->laporanAbsen($nis, $nip, $d);
  if ($absen) {
    echo $absen['keterangan'];
  } else {
    echo 'H';
  }
}

function jml_tidak_masuk($keterangan, $nip, $nis, $interval)
{
  $ci = get_instance();
  $ci->load->model('Absen_Model', 'absen');
  $jml_tidak_masuk = $ci->absen->jmlTidakMasuk($keterangan, $nip, $nis, $interval);
  if ($jml_tidak_masuk) {
    $j = 0;
    foreach ($jml_tidak_masuk as $row) {
      $j += $row['jumlah_tidak_masuk'];
    }
    return $j;
  } else {
    return '';
  }
}

function jml_tidak_masuk_bk($keterangan, $nis, $interval)
{
  $ci = get_instance();
  $ci->load->model('Absen_Model', 'absen');
  $jml_tidak_masuk = $ci->absen->jmlTidakMasukBK($keterangan, $nis, $interval);
  if ($jml_tidak_masuk) {
    $j = 0;
    foreach ($jml_tidak_masuk as $row) {
      $j += $row['jumlah_tidak_masuk'];
    }
    return $j;
  } else {
    return '';
  }
}

function interval_waktu($waktu)
  {
    if($waktu === '7') {
      return '1 minggu lalu';
    }

    if($waktu === '14') {
      return '2 minggu lalu';
    }

    if($waktu === '30') {
      return '1 bulan lalu';
    }

    if($waktu === '90') {
      return '3 bulan lalu';
    }

    if($waktu === '180') {
      return '6 bulan lalu';
    }
  }
