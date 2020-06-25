<div class="container">
  <div class="row">
  
  <div class="col-lg-12">
  <p class="text-center"><a href="<?= base_url('Guru'); ?>" class="btn btn-info">kembali</a></p>
    <div class="card">
    <div class="card-header">Laporan absen kelas <?= $siswa[0]['nama_kelas']; ?> - <?= interval_waktu($this->uri->segment(4)); ?></div>
    <div class="card-body">
    <div class="row">
    <div class="col-lg-3">
    <div class="dropdown show">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Pilih interval
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="<?= base_url('Guru/laporan_absen/' . $this->uri->segment(3) . '/7'); ?>">1 minggu lalu</a>
        <a class="dropdown-item" href="<?= base_url('Guru/laporan_absen/' . $this->uri->segment(3) . '/14'); ?>">2 minggu lalu</a>
        <a class="dropdown-item" href="<?= base_url('Guru/laporan_absen/' . $this->uri->segment(3) . '/30'); ?>">1 bulan lalu</a>
        <a class="dropdown-item" href="<?= base_url('Guru/laporan_absen/' . $this->uri->segment(3) . '/90'); ?>">3 bulan lalu</a>
        <a class="dropdown-item" href="<?= base_url('Guru/laporan_absen/' . $this->uri->segment(3) . '/180'); ?>">6 bulan lalu</a>
      </div>
    </div>
    </div>
    </div>

    <hr>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nis</th>
          <th scope="col">nama</th>
          <th scope="col">JK</th>
          <th scope="col">S</th>
          <th scope="col">I</th>
          <th scope="col">A</th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1; ?>
      <?php foreach($siswa as $row) { ?>
        <tr>
          <th scope="row"><?= $i++; ?></th>
          <td><?= $row['nis']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['jenis_kelamin']; ?></td>
          <td style="width: 50px;"><?= jml_tidak_masuk('S', $profile['nip'], $row['nis'], $this->uri->segment(4)); ?></td>
          <td style="width: 50px;"><?= jml_tidak_masuk('I', $profile['nip'], $row['nis'], $this->uri->segment(4)); ?></td>
          <td style="width: 50px;"><?= jml_tidak_masuk('A', $profile['nip'], $row['nis'], $this->uri->segment(4)); ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    </div>
    </div>

  </div>

  </div>
</div>