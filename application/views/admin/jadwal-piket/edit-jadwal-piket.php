<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <p class="text-center"><a href="<?= base_url('Admin/jadwal_piket'); ?>">kembali</a></p>
      <div class="card">
        <div class="card-header text-muted">Edit jadwal piket</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="id_jadwal_piket">Id jadwal piket</label>
              <input type="text" class="form-control" id="id_jadwal_piket" name="id_jadwal_piket" value="<?= $jadwal_piket['id_jadwal_piket']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="hari">Hari</label>
              <input type="text" class="form-control" id="hari" value="<?= hari($jadwal_piket['hari']); ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nip">Nama</label>
              <select name="nip" id="nip" class="form-control">
                <?php foreach ($pengajar as $row) { ?>
                  <option value="<?= $row['nip']; ?>" <?= selected_pengajar($row['nip'], $jadwal_piket['nip']); ?>><?= $row['nama']; ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">edit data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>