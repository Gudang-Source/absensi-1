<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_BK extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('login')) {
      redirect('Authentication/login');
    }

    $this->load->model('Pengajar_Model', 'pengajar');
    $this->load->model('Siswa_Model', 'siswa');
    $this->load->model('Absen_Model', 'absen');
    $this->load->model('Kelas_Model', 'kelas');
  }

  public function index()
  {
    $data['title'] = 'Home';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['kelas'] = $this->kelas->getKelas();
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru-bk/index');
    $this->load->view('templates/footer-guru');
  }

  
  public function laporan_absen($id_kelas, $interval)
  {
    $data['title'] = 'Laporan absen';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa'] = $this->siswa->getSiswaByKelas($id_kelas);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru-bk/laporan-absen');
    $this->load->view('templates/footer-guru');
  }

  public function siswa_bermasalah()
  {
    $data['title'] = 'Siswa bermasalah';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa_bermasalah'] = $this->siswa->getSiswaBermasalahBK();
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru-bk/data-siswa-bermasalah');
    $this->load->view('templates/footer-guru');
  }

  public function siswa_bermasalah_detail($id_siswa_bermasalah)
  {
    $data['title'] = 'Siswa bermasalah';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['siswa_bermasalah'] = $this->siswa->getSiswaBermasalahByIdBK($id_siswa_bermasalah);
    $this->load->view('templates/header-guru', $data);
    $this->load->view('templates/sidebar-guru');
    $this->load->view('templates/topbar-guru');
    $this->load->view('guru-bk/data-siswa-bermasalah-detail');
    $this->load->view('templates/footer-guru');
  }

  public function pembinaan($id_siswa_bermasalah)
  {
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|min_length[5]');

    if($this->form_validation->run() == false) {
      $data['title'] = 'Lapor siswa bermasalah';
      $this->load->view('templates/header-guru', $data);
      $this->load->view('templates/sidebar-guru');
      $this->load->view('templates/topbar-guru');
      $this->load->view('guru-bk/pembinaan');
      $this->load->view('templates/footer-guru');
    } else {
      date_default_timezone_set('Asia/Jakarta');
      $data_binaan = [
        'id_siswa_bermasalah' => $this->uri->segment(3),
        'nip' => $data['profile']['nip'],
        'keterangan' => $this->input->post('keterangan'),
        'tanggal' => date('Y-m-d')
      ];

      if ($this->siswa->binaSiswa($data_binaan)) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Input data binaan berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Guru_BK/siswa_bermasalah');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Input data binaan gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Guru_BK/siswa_bermasalah');
      }
    }
  }
  
}