<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header text-muted">Tambah jadwal pelajaran detail</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="id_jadwal_pelajaran">Jadwal pelajaran</label>
              <select name="id_jadwal_pelajaran" id="id_jadwal_pelajaran" class="form-control">
                <?php foreach ($jadwal_pelajaran as $row) { ?>
                  <option value="<?= $row['id_jadwal_pelajaran']; ?>"><?= $row['nama']; ?> | <?= $row['nama_pelajaran']; ?> | <?= $row['nama_kelas']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="hari">Hari</label>
              <select name="hari" id="hari" class="form-control">
                <option value="1">Senin</option>
                <option value="2">Selasa</option>
                <option value="3">Rabu</option>
                <option value="4">Kamis</option>
                <option value="5">Jumat</option>
              </select>
            </div>
            <div class="form-group" style="width: 200px;">
              <label for="jumlah_jam">Jumlah jam</label>
              <input name="jumlah_jam" id="jumlah_jam" type="text" class="form-control">
            </div>
            <div class="form-group" style="width: 200px;">
              <label for="jam_mulai">Jam mulai</label>
              <input name="jam_mulai" id="jam_mulai" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">tambah data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>