<div class="container-fluid">
  <div class="row justify-content-center">

    <div class="col-lg-7">
      <div class="card shadow">
        <div class="card-header text-muted">Selamat Datang di Dashboard BK</div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
            <h3 class="text-center">Laporan absensi</h3>
              <ul class="list-group">
              <?php foreach($kelas as $row) { ?>
                <li class="list-group-item"><a href="<?= base_url('Guru_BK/laporan_absen/' . $row['id_kelas'] . '/7'); ?>"><?= $row['nama_kelas']; ?></a></li>
              <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>