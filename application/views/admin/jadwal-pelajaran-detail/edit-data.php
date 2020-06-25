<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <p class="text-center"><a href="<?= base_url('Admin/jadwal_pelajaran_detail'); ?>" class="btn btn-info">kembali</a></p>
      <div class="card">
        <div class="card-header text-muted">Edit jadwal pelajaran detail</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="id_jadwal_pelajaran">Jadwal pelajaran</label>
              <select name="id_jadwal_pelajaran" id="id_jadwal_pelajaran" class="form-control">
                <?php foreach ($jadwal_pelajaran as $row) { ?>
                  <option value="<?= $row['id_jadwal_pelajaran']; ?>" <?= selected_id_jadwal_pelajaran($row['id_jadwal_pelajaran'], $jadwal_pelajaran_detail['id_jadwal_pelajaran']); ?>><?= $row['nama']; ?> | <?= $row['nama_pelajaran']; ?> | <?= $row['nama_kelas']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="hari">Hari</label>
              <select name="hari" id="hari" class="form-control">
                <option value="1" <?= selected_hari('1', $jadwal_pelajaran_detail['hari']); ?>>Senin</option>
                <option value="2" <?= selected_hari('2', $jadwal_pelajaran_detail['hari']); ?>>Selasa</option>
                <option value="3" <?= selected_hari('3', $jadwal_pelajaran_detail['hari']); ?>>Rabu</option>
                <option value="4" <?= selected_hari('4', $jadwal_pelajaran_detail['hari']); ?>>Kamis</option>
                <option value="5" <?= selected_hari('5', $jadwal_pelajaran_detail['hari']); ?>>Jumat</option>
              </select>
            </div>
            <div class="form-group" style="width: 200px;">
              <label for="jumlah_jam">Jumlah jam</label>
              <input name="jumlah_jam" id="jumlah_jam" type="text" class="form-control" value="<?= $jadwal_pelajaran_detail['jumlah_jam']; ?>">
            </div>
            <div class="form-group" style="width: 200px;">
              <label for="jam_mulai">Jam mulai</label>
              <input name="jam_mulai" id="jam_mulai" type="text" class="form-control" value="<?= $jadwal_pelajaran_detail['jam_mulai']; ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-block">edit data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>