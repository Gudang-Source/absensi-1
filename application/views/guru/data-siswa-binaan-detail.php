<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
    <p class="text-center"><a href="<?= base_url('Guru/siswa_binaan'); ?>" class="btn btn-info">kembali</a></p>
      <div class="card">
        <div class="card-header">Data siswa bermasalah detail</div>
        <div class="card-body">
          <p class="">Nama : <?= $siswa_binaan['nama']; ?></p>
          <p class="">NIS : <?= $siswa_binaan['nis']; ?></p>
          <p class="">Kelas : <?= $siswa_binaan['nama_kelas']; ?></p>
          <p class="">Guru BK : <?= $siswa_binaan['nama_guru']; ?></p>
          <p class="">Tanggal : <?= $siswa_binaan['tanggal']; ?></p>
          <p class="">Keterangan : <?= $siswa_binaan['keterangan']; ?></p>
        </div>
      </div>

    </div>
  </div>
</div>