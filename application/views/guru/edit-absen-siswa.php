<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <p class="text-center"><a href="<?= base_url('Guru'); ?>" class="btn btn-info">kembali</a></p>
    <div class="card">
      <div class="card-header">Edit absen siswa</div>
      <div class="card-body">
      <form action="" method="get">
      <div class="row">
        <div class="col-lg-4">
        <div class="input-group mb-3">
          <input type="date" class="form-control" name="tgl">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Pilih</button>
          </div>
        </div>  
        </div>
      </div>
      </form>
      <hr>

      <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">nis</th>
            <th scope="col">nama</th>
            <th scope="col">kelas</th>
            <th scope="col">tanggal</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
          <?php foreach($data_absen as $row) { ?>
          <tr>
            <th scope="row" width="75"><?= $i++; ?></th>
            <td><?= $row['nis']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td width="150px"><?= $row['nama_kelas']; ?></td>
            <td width="150px"><?= $row['tanggal']; ?></td>
            <td width="75px">
              <div class="form-group">
                <input data-tanggal="<?= $row['tanggal']; ?>" data-nis="<?= $row['nis']; ?>" type="text" class="form-control input-edit-absen" value="<?= $row['keterangan']; ?>">
              </div>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
      </div>
    </div>

    </div>
  </div>
</div>