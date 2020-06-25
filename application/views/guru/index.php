<div class="container-fluid">
  <div class="row justify-content-around">

    <div class="col-lg-5">
      <div class="card shadow">
        <div class="card-header text-muted">Selamat Datang</div>
        <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
          <?php setlocale(LC_ALL, 'IND'); ?>
          <h3 clas=""><?= strftime('%d %B %Y'); ?></h3>
          <p id="jam" class="text-muted">--:--</p>
          <p class="mt-4">Nama : <?= $profile['nama']; ?></p>
          <p>NIP : <?= $profile['nip']; ?></p>
          <hr>
          <h4 class="text-center mb-4">Jadwal Sekarang</h4>
          <?php if ($jam_sekarang) { ?>
            <p>Kelas : <?= $jam_sekarang['nama_kelas']; ?></p>
            <p>Mata Pelajaran : <?= $jam_sekarang['nama_pelajaran']; ?></p>
            <a href="<?= base_url('Guru/absen/' . $jam_sekarang['id_jadwal_pelajaran_detail']); ?>" class="btn btn-primary btn-block">Absen</a>
          <?php } else { ?>
            <h3>Tidak Ada Jadwal</h3>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="col-lg-5">

      <div class="card shadow">
        <div class="card-header text-muted">Jadwal Hari Ini</div>
        <div class="card-body">

          <?php if ($jadwal_hari_ini) { ?>
            <?php foreach ($jadwal_hari_ini as $row) { ?>
              <p class="text-dark"><?= $row['nama_kelas']; ?> : <span class="text-muted"><?= $row['nama_pelajaran']; ?></span></p>
            <?php } ?>
          <?php } else { ?>
            <h3>Tidak Ada Jadwal</h3>
          <?php } ?>

        </div>
      </div>

      <div class="card shadow">
        <div class="card-header text-muted">Laporan Absen harian</div>
        <div class="card-body">
          <ul class="list-group">
          <?php if ($jadwal_hari_ini) { ?>
            <?php foreach ($jadwal_hari_ini as $row) { ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $row['nama_kelas']; ?>
                <a href="<?= base_url('Guru/laporan/' . $row['id_kelas'] . '/' . date('Y-m-d')); ?>" class="badge badge-primary">Lihat</a>
              </li>
            <?php } ?>
          <?php } else { ?>
            <h3>Tidak Ada Jadwal</h3>
          <?php } ?>
          </ul>
        </div>
      </div>

      <div class="card shadow">
        <div class="card-header text-muted">Laporan Absen</div>
        <div class="card-body">
          <ul class="list-group">
            <?php foreach ($kelas_ajar as $row) { ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $row['nama_kelas']; ?>
                <a href="<?= base_url('Guru/laporan_absen/' . $row['id_kelas'] . '/7'); ?>" class="badge badge-primary">Lihat</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>

    </div>

  </div>
</div>