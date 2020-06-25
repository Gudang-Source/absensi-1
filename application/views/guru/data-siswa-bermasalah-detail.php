<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
    <p class="text-center"><a href="<?= base_url('Guru/siswa_bermasalah'); ?>" class="btn btn-info">kembali</a></p>
      <div class="card">
        <div class="card-header">Data siswa bermasalah detail</div>
        <div class="card-body">
          <p class="">Nama : <?= $siswa_bermasalah['nama']; ?></p>
          <p class="">NIS : <?= $siswa_bermasalah['nis']; ?></p>
          <p class="">Kelas : <?= $siswa_bermasalah['nama_kelas']; ?></p>
          <p class="">Keterangan : <?= $siswa_bermasalah['keterangan']; ?></p>
        </div>
      </div>

    </div>
  </div>
</div>