<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('login')) {
      redirect('Authentication/login');
    }

    if ($this->session->userdata('hak_akses') != 1) {
      redirect('Guru/index');
    }

    $this->load->model('Pengajar_Model', 'pengajar');
    $this->load->model('Jurusan_Model', 'jurusan');
    $this->load->model('Kelas_Model', 'kelas');
    $this->load->model('Agama_Model', 'agama');
    $this->load->model('Siswa_Model', 'siswa');
    $this->load->model('Mata_Pelajaran_Model', 'mata_pelajaran');
    $this->load->model('Jadwal_Pelajaran_Model', 'jadwal_pelajaran');
    $this->load->model('Jadwal_Piket_Model', 'jadwal_piket');
    $this->load->model('Dashboard_Model', 'dashboard');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['jumlah_siswa'] = $this->dashboard->hitungSiswa();
    $data['jumlah_pengajar'] = $this->dashboard->hitungPengajar();
    $data['jumlah_kelas'] = $this->dashboard->hitungKelas();
    $data['jumlah_jurusan'] = $this->dashboard->hitungJurusan();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/index');
    $this->load->view('templates/footer-admin');
  }

  // Jurusan

  public function jurusan()
  {
    $data['title'] = 'Jurusan';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['jurusan'] = $this->jurusan->getJurusan();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/jurusan/index');
    $this->load->view('templates/footer-admin');
  }

  public function tambah_jurusan()
  {
    $this->form_validation->set_rules('id_jurusan', 'Id jurusan', 'required|min_length[4]|max_length[4]|numeric|trim|is_unique[jurusan.id_jurusan]');
    $this->form_validation->set_rules('nama_jurusan', 'Nama jurusan', 'required|min_length[4]');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah jurusan';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/jurusan/tambah-jurusan');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->jurusan->addJurusan($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data jurusan berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jurusan');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data jurusan gagal ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jurusan');
      }
    }
  }

  public function edit_jurusan($id_jurusan)
  {
    $this->form_validation->set_rules('id_jurusan', 'Id jurusan', 'required|min_length[4]|max_length[4]|numeric|trim');
    $this->form_validation->set_rules('nama_jurusan', 'Nama jurusan', 'required|min_length[4]');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Edit jurusan';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['jurusan'] = $this->jurusan->getJurusanById($id_jurusan);
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/jurusan/edit-jurusan');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->jurusan->editJurusan($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data jurusan berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jurusan');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data jurusan gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jurusan');
      }
    }
  }

  // Kelas

  public function kelas()
  {
    $data['title'] = 'Kelas';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['kelas'] = $this->kelas->getKelas();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/kelas/index');
    $this->load->view('templates/footer-admin');
  }

  public function tambah_kelas()
  {
    $this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|min_length[7]|max_length[7]|numeric|trim|is_unique[kelas.id_kelas]');
    $this->form_validation->set_rules('nama_kelas', 'Nama kelas', 'required|min_length[4]');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah kelas';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['jurusan'] = $this->jurusan->getJurusan();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/kelas/tambah-kelas');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->kelas->addKelas($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data kelas berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/kelas');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data kelas gagal ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/kelas');
      }
    }
  }

  public function edit_kelas($id_kelas)
  {
    $this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|min_length[7]|max_length[7]|numeric|trim');
    $this->form_validation->set_rules('nama_kelas', 'Nama kelas', 'required|min_length[4]');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Edit kelas';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['jurusan'] = $this->jurusan->getJurusan();
      $data['kelas'] = $this->kelas->getKelasById($id_kelas);
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/kelas/edit-kelas');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->kelas->editKelas($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data kelas berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/kelas');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data kelas gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/kelas');
      }
    }
  }

  // Siswa

  public function siswa()
  {
    $data['title'] = 'Siswa';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));

    $jumlah_record = $this->siswa->jumlah_data();
    $this->load->library('pagination');
    $config['base_url'] = 'http://localhost/absensi/Admin/siswa';
    $config['total_rows'] = $jumlah_record;
    $config['per_page'] = 10;
    $config["uri_segment"] = 3;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['siswa'] = $this->siswa->getSiswa($config['per_page'], $page);
    echo $this->pagination->create_links();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/siswa/index', $data);
    $this->load->view('templates/footer-admin');
  }

  public function tambah_siswa()
  {
    $this->form_validation->set_rules('nis', 'NIS', 'required|min_length[10]|max_length[10]|numeric|trim|is_unique[siswa.nis]');
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]');
    $this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|min_length[7]|max_length[7]|numeric|trim');
    $this->form_validation->set_rules('id_jurusan', 'Id jurusan', 'required|min_length[4]|max_length[4]|numeric|trim');
    $this->form_validation->set_rules('id_agama', 'Id agama', 'required|min_length[1]|max_length[1]|numeric|trim');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah siswa';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['jurusan'] = $this->jurusan->getJurusan();
      $data['kelas'] = $this->kelas->getKelas();
      $data['agama'] = $this->agama->getAgama();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/siswa/tambah-siswa');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->siswa->addSiswa($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data siswa berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/siswa');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data siswa gagal ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/siswa');
      }
    }
  }

  public function edit_siswa($nis)
  {
    $this->form_validation->set_rules('nis', 'NIS', 'required|min_length[10]|max_length[10]|numeric|trim');
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[4]');
    $this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|min_length[7]|max_length[7]|numeric|trim');
    $this->form_validation->set_rules('id_jurusan', 'Id jurusan', 'required|min_length[4]|max_length[4]|numeric|trim');
    $this->form_validation->set_rules('id_agama', 'Id agama', 'required|min_length[1]|max_length[1]|numeric|trim');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Edit siswa';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['siswa'] = $this->siswa->getSiswaByNIS($nis);
      $data['jurusan'] = $this->jurusan->getJurusan();
      $data['kelas'] = $this->kelas->getKelas();
      $data['agama'] = $this->agama->getAgama();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/siswa/edit-siswa');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->siswa->editSiswa($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data siswa berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/siswa');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data siswa gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/siswa');
      }
    }
  }

  // Pengajar

  public function pengajar()
  {
    $data['title'] = 'Pengajar';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['pengajar'] = $this->pengajar->getPengajar();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/pengajar/index');
    $this->load->view('templates/footer-admin');
  }

  public function tambah_pengajar()
  {
    $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[18]|max_length[18]|numeric|trim|is_unique[pengajar.nip]');
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
    $this->form_validation->set_rules('id_agama', 'Id agama', 'required|min_length[1]|max_length[1]|numeric|trim');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah pengajar';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['agama'] = $this->agama->getAgama();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/pengajar/tambah-pengajar');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->pengajar->addPengajar($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data pengajar berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/pengajar');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data pengajar gagal ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/pengajar');
      }
    }
  }

  public function edit_pengajar($nip)
  {
    $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[18]|max_length[18]|numeric|trim');
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
    $this->form_validation->set_rules('id_agama', 'Id agama', 'required|min_length[1]|max_length[1]|numeric|trim');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Edit pengajar';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['pengajar'] = $this->pengajar->getPengajarByNIP($nip);
      $data['agama'] = $this->agama->getAgama();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/pengajar/edit-pengajar');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->pengajar->editPengajar($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data pengajar berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/pengajar');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data pengajar gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/pengajar');
      }
    }
  }

  public function mata_pelajaran()
  {
    $data['title'] = 'Jurusan';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['mata_pelajaran'] = $this->mata_pelajaran->getMataPelajaran();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/mata-pelajaran/index');
    $this->load->view('templates/footer-admin');
  }

  public function tambah_mata_pelajaran()
  {
    $this->form_validation->set_rules('id_pelajaran', 'Id mata pelajaran', 'required|min_length[9]|max_length[9]|trim|is_unique[mata_pelajaran.id_pelajaran]');
    $this->form_validation->set_rules('nama_pelajaran', 'Nama pelajaran', 'required|min_length[4]');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah mata_pelajaran';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/mata-pelajaran/tambah-mata-pelajaran');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->mata_pelajaran->addMataPelajaran($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data mata pelajaran berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/mata_pelajaran');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data mata pelajaran gagal ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/mata_pelajaran');
      }
    }
  }

  public function edit_mata_pelajaran($id_pelajaran)
  {
    $this->form_validation->set_rules('id_pelajaran', 'Id mata pelajaran', 'required|min_length[9]|max_length[9]|trim');
    $this->form_validation->set_rules('nama_pelajaran', 'Nama pelajaran', 'required|min_length[4]');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Edit mata_pelajaran';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['mata_pelajaran'] = $this->mata_pelajaran->getMataPelajaranById($id_pelajaran);
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/mata-pelajaran/edit-mata-pelajaran');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->mata_pelajaran->editMataPelajaran($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data mata pelajaran berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/mata_pelajaran');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data mata pelajaran gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/mata_pelajaran');
      }
    }
  }

  public function jadwal_pelajaran()
  {
    $data['title'] = 'Jadwal Pelajaran';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['jadwal_pelajaran'] = $this->jadwal_pelajaran->getJadwalPelajaran();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/jadwal-pelajaran/index');
    $this->load->view('templates/footer-admin');
  }

  public function tambah_jadwal_pelajaran()
  {
    $this->form_validation->set_rules('id_pelajaran', 'Id mata pelajaran', 'required|min_length[9]|max_length[9]|trim');
    $this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|min_length[7]|max_length[7]|numeric|trim');
    $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[18]|max_length[18]|numeric|trim');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah Mata Pelajaran';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['mata_pelajaran'] = $this->mata_pelajaran->getMataPelajaran();
      $data['kelas'] = $this->kelas->getKelas();
      $data['pengajar'] = $this->pengajar->getPengajar();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/jadwal-pelajaran/tambah-jadwal-pelajaran');
      $this->load->view('templates/footer-admin');
    } else {
      $data_input = [
        'id_jadwal_pelajaran' => '',
        'id_pelajaran' => $this->input->post('id_pelajaran'),
        'id_kelas' => $this->input->post('id_kelas'),
        'nip' => $this->input->post('nip')
      ];

      if ($this->jadwal_pelajaran->addJadwalPelajaran($data_input)) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data jadwal pelajaran berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data jadwal pelajaran gagal ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran');
      }
    }
  }

  public function edit_jadwal_pelajaran($id_jadwal_pelajaran)
  {
    $this->form_validation->set_rules('id_pelajaran', 'Id mata pelajaran', 'required|min_length[9]|max_length[9]|trim');
    $this->form_validation->set_rules('id_kelas', 'Id kelas', 'required|min_length[7]|max_length[7]|numeric|trim');
    $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[18]|max_length[18]|numeric|trim');

    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah Mata Pelajaran';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['jadwal_pelajaran'] = $this->jadwal_pelajaran->getJadwalPelajaranById($id_jadwal_pelajaran);
      $data['mata_pelajaran'] = $this->mata_pelajaran->getMataPelajaran();
      $data['kelas'] = $this->kelas->getKelas();
      $data['pengajar'] = $this->pengajar->getPengajar();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/jadwal-pelajaran/edit-jadwal-pelajaran');
      $this->load->view('templates/footer-admin');
    } else {
      $data_input = [
        'id_jadwal_pelajaran' => $id_jadwal_pelajaran,
        'id_pelajaran' => $this->input->post('id_pelajaran'),
        'id_kelas' => $this->input->post('id_kelas'),
        'nip' => $this->input->post('nip')
      ];

      if ($this->jadwal_pelajaran->editJadwalPelajaran($data_input)) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data jadwal pelajaran berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data jadwal pelajaran gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran');
      }
    }
  }

  // Jadwal pelajaran detail
  public function jadwal_pelajaran_detail()
  {
    $data['title'] = 'Jadwal Pelajaran Detail';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['jadwal_pelajaran_detail'] = $this->jadwal_pelajaran->getJadwalPelajaranDetail();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/jadwal-pelajaran-detail/index');
    $this->load->view('templates/footer-admin');
  }

  public function tambah_jadwal_pelajaran_detail()
  {
    $this->form_validation->set_rules('jumlah_jam', 'Jumlah jam', 'required|max_length[2]|min_length[1]');
    $this->form_validation->set_rules('jam_mulai', 'Jam mulai', 'required|max_length[5]|min_length[5]');
    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah jadwal pelajaran detail';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['jadwal_pelajaran'] = $this->jadwal_pelajaran->getJadwalPelajaran();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/jadwal-pelajaran-detail/tambah-data');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->jadwal_pelajaran->addJadwalPelajaranDetail($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data jadwal pelajaran detail berhasil ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran_detail');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data jadwal pelajaran detail gagal ditambah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran_detail');
      }
    }
  }

  public function edit_jadwal_pelajaran_detail($id_jadwal_pelajaran_detail)
  {
    $this->form_validation->set_rules('jumlah_jam', 'Jumlah jam', 'required|max_length[2]|min_length[1]');
    $this->form_validation->set_rules('jam_mulai', 'Jam mulai', 'required|max_length[5]|min_length[5]');
    if ($this->form_validation->run() === false) {
      $data['title'] = 'Tambah jadwal pelajaran detail';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['jadwal_pelajaran'] = $this->jadwal_pelajaran->getJadwalPelajaran();
      $data['jadwal_pelajaran_detail'] = $this->jadwal_pelajaran->getJadwalPelajaranDetailById($id_jadwal_pelajaran_detail);
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/jadwal-pelajaran-detail/edit-data');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->jadwal_pelajaran->editJadwalPelajaranDetail($this->input->post(), $id_jadwal_pelajaran_detail)) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data jadwal pelajaran detail berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran_detail');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data jadwal pelajaran detail gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_pelajaran_detail');
      }
    }
  }

  // Guru piket
  public function jadwal_piket()
  {
    $data['title'] = 'Jadwal piket';
    $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
    $data['guru_piket'] = $this->jadwal_piket->getGuruPiket();
    $this->load->view('templates/header-admin', $data);
    $this->load->view('templates/sidebar-admin');
    $this->load->view('templates/topbar-admin');
    $this->load->view('admin/jadwal-piket/index');
    $this->load->view('templates/footer-admin');
  }

  public function edit_jadwal_piket($id_jadwal_piket)
  {
    $this->form_validation->set_rules('nip', 'NIP', 'required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Jadwal piket';
      $data['profile'] = $this->pengajar->getPengajarByNIP($this->session->userdata('nip'));
      $data['guru_piket'] = $this->jadwal_piket->getGuruPiket();
      $data['jadwal_piket'] = $this->jadwal_piket->getJadwalPiketById($id_jadwal_piket);
      $data['pengajar'] = $this->pengajar->getPengajar();
      $this->load->view('templates/header-admin', $data);
      $this->load->view('templates/sidebar-admin');
      $this->load->view('templates/topbar-admin');
      $this->load->view('admin/jadwal-piket/edit-jadwal-piket');
      $this->load->view('templates/footer-admin');
    } else {
      if ($this->jadwal_piket->editJadwalPiket($this->input->post())) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data jadwal piket berhasil diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_piket');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data jadwal piket gagal diedit!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Admin/jadwal_piket');
      }
    }
  }
}
