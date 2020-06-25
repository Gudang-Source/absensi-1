<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Absensi</div>
  </a>


  <?php if ($this->session->userdata('hak_akses') === '1') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Kelola
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Kelola data</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Kelola data:</h6>
          <a class="collapse-item" href="<?= base_url('Admin'); ?>">Home</a>
          <a class="collapse-item" href="<?= base_url('Admin/jurusan'); ?>">Jurusan</a>
          <a class="collapse-item" href="<?= base_url('Admin/kelas'); ?>">Kelas</a>
          <a class="collapse-item" href="<?= base_url('Admin/siswa'); ?>">Siswa</a>
          <a class="collapse-item" href="<?= base_url('Admin/pengajar'); ?>">Pengajar</a>
          <a class="collapse-item" href="<?= base_url('Admin/mata_pelajaran'); ?>">Mata pelajaran</a>
          <a class="collapse-item" href="<?= base_url('Admin/jadwal_pelajaran'); ?>">Jadwal pelajaran</a>
          <a class="collapse-item" href="<?= base_url('Admin/jadwal_pelajaran_detail'); ?>">Detail Jadwal pelajaran</a>
        </div>
      </div>
    </li>
  <?php } ?>

  <?php if ($this->session->userdata('hak_akses') === '3') { ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Guru BK
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Guru BK</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Guru BK:</h6>
          <a class="collapse-item" href="<?= base_url('Guru_BK/index'); ?>">Dashboard</a>
        </div>
      </div>
    </li>
  <?php } ?>

  <!-- Divider -->
  <hr class="sidebar-divider">




  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->