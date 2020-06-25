<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('login')) {
      redirect('Authentication/login');
    }

    $this->load->model('Pengajar_Model', 'pengajar');
    $this->load->model('Jadwal_Pelajaran_Model', 'jadwal_pelajaran');
    $this->load->model('Siswa_Model', 'siswa');
    $this->load->model('Absen_Model', 'absen');

    if ($this->session->userdata('hak_akses') != 2 && $this->session->userdata('hak_akses') != 3) {
      redirect('Admin/index');
    }
  }

  public function index()
  {
    $data['title'] = 'Home';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['kelas_ajar'] = $this->jadwal_pelajaran->getKelasAjar($data['profile']['nip']);
    $data['jadwal_hari_ini'] = $this->jadwal_pelajaran->getJadwalHariIni($data['profile']['nip']);
    $data['jam_sekarang'] = $this->jadwal_pelajaran->getJadwalSekarang(jadwal_sekarang($data['jadwal_hari_ini']));
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/index');
    $this->load->view('templates/footer-guru');
  }

  public function absen($id_jadwal_pelajaran_detail)
  {
    $data['title'] = 'Absen';
    $this->form_validation->set_rules('nis', 'NIS', 'required');
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['jadwal_pelajaran'] = $this->jadwal_pelajaran->getJadwalPelajaranById($id_jadwal_pelajaran_detail);
    $data['siswa'] = $this->siswa->getSiswaByKelas($data['jadwal_pelajaran']['id_kelas']);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/absen');
    $this->load->view('templates/footer-guru');
  }

  public function absen_siswa()
  {
    date_default_timezone_set('Asia/Jakarta');
    $jadwal_pelajaran = $this->jadwal_pelajaran->getJadwalPelajaranById($this->input->post('id_jadwal_pelajaran_detail'));
    for ($i = 1; $i <= $jadwal_pelajaran['jumlah_jam']; $i++) {
      $data_input[] = [
        'id_jadwal_pelajaran_detail' => $this->input->post('id_jadwal_pelajaran_detail'),
        'nis' => $this->input->post('nis'),
        'jam_ke' => $i,
        'keterangan' => $this->input->post('keterangan'),
        'tanggal' => date('Y-m-d'),
        'jam' => date('H:i')
      ];
    }

    if ($this->absen->absenSiswa($data_input)) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Absen berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Guru/absen/' . $id_jadwal_pelajaran_detail);
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Absen gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Guru/absen/' . $id_jadwal_pelajaran_detail);
    }
  }

  public function edit_absen_siswa() 
  {
    date_default_timezone_set('Asia/Jakarta');
    if(isset($_GET['submit']) AND $_GET['tgl'] != '') {
      $tgl = $_GET['tgl'];
    } else {
      $tgl = date('Y-m-d');
    }

    $data['title'] = 'Absen';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['data_absen'] = $this->absen->getDataAbsen($data['profile']['nip'], $tgl);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/edit-absen-siswa');
    $this->load->view('templates/footer-guru');
  }

  public function edit_absen()
  {
    $data_edit_absen = [
      'nis' => $this->input->post('nis'),
      'tanggal' => $this->input->post('tanggal'),
      'keterangan' => $this->input->post('keterangan')
    ];

    if ($this->absen->editAbsen($data_edit_absen)) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Absen berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Guru/edit_absen_siswa');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Absen gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('Guru/edit_absen_siswa');
    }
  }

  public function laporan_absen($id_kelas, $interval)
  {
    $data['title'] = 'Laporan absen';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa'] = $this->siswa->getSiswaByKelas($id_kelas);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/laporan-absen');
    $this->load->view('templates/footer-guru');
  }

  public function lapor_siswa_bermasalah()
  {
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $this->form_validation->set_rules('nis', 'NIS', 'required|min_length[10]|max_length[10]|numeric|trim');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|min_length[5]');

    if($this->form_validation->run() == false) {
      $data['title'] = 'Lapor siswa bermasalah';
      $this->load->view('templates/header-guru', $data);
      $this->load->view('templates/sidebar-guru');
      $this->load->view('templates/topbar-guru');
      $this->load->view('guru/siswa-bermasalah');
      $this->load->view('templates/footer-guru');
    } else {
      $data_laporan = [
        'nis' => $this->input->post('nis'),
        'nip' => $data['profile']['nip'],
        'keterangan' => $this->input->post('keterangan'),
        'status' => 0
      ];

      if ($this->siswa->laporSiswa($data_laporan)) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Siswa berhasil dilaporkan kepada BK!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Guru');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Siswa gagal dilaporkan kepada BK!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Guru');
      }
    }
  }
  
  public function siswa_bermasalah()
  {
    $data['title'] = 'Siswa bermasalah';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa_bermasalah'] = $this->siswa->getSiswaBermasalah($data['profile']['nip']);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/data-siswa-bermasalah');
    $this->load->view('templates/footer-guru');
  }

  public function siswa_bermasalah_detail($id_siswa_bermasalah)
  {
    $data['title'] = 'Siswa bermasalah detail';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa_bermasalah'] = $this->siswa->getSiswaBermasalahById($id_siswa_bermasalah);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/data-siswa-bermasalah-detail');
    $this->load->view('templates/footer-guru');
  }

  public function siswa_binaan()
  {
    $data['title'] = 'Siswa binaan';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa_binaan'] = $this->siswa->getSiswaBinaan($data['profile']['nip']);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/data-siswa-binaan');
    $this->load->view('templates/footer-guru');
  }

  public function siswa_binaan_detail($id_siswa_binaan)
  {
    $data['title'] = 'Siswa binaan detail';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa_binaan'] = $this->siswa->getSiswaBinaanById($id_siswa_binaan);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru/data-siswa-binaan-detail');
    $this->load->view('templates/footer-guru');
  }
}
