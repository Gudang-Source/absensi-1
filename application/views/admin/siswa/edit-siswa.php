<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <a href="<?= base_url('Admin/siswa'); ?>" class="btn btn-info">Kembali</a>
      <div class="card shadow">
        <div class="card-header text-muted">Edit Siswa</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="nis">NIS</label>
              <input type="text" name="nis" id="nis" class="form-control" autocomplete="off" value="<?= $siswa['nis']; ?>" readonly>
              <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nama">Nama Siswa</label>
              <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" value="<?= $siswa['nama']; ?>">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="agama">Agama</label>
              <select name="id_agama" id="agama" class="form-control">
                <?php foreach ($agama as $row) { ?>
                  <option value="<?= $row['id_agama']; ?>" <?= selected_agama($siswa['id_agama'], $row['id_agama']); ?>><?= $row['nama_agama']; ?></option>
                <?php } ?>
              </select>
              <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="id_jurusan" id="jurusan" class="form-control">
                  <?php foreach ($jurusan as $row) { ?>
                    <option value="<?= $row['id_jurusan']; ?>" <?= selected_jurusan($siswa['id_jurusan'], $row['id_jurusan']); ?>><?= $row['nama_jurusan']; ?></option>
                  <?php } ?>
                </select>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <select name="id_kelas" id="kelas" class="form-control">
                    <?php foreach ($kelas as $row) { ?>
                      <option value="<?= $row['id_kelas']; ?>" <?= selected_kelas($siswa['id_kelas'], $row['id_kelas']); ?>><?= $row['nama_kelas']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="L" <?= selected_jk($siswa['jenis_kelamin'], 'L'); ?>>Laki-laki</option>
                    <option value="P" <?= selected_jk($siswa['jenis_kelamin'], 'P'); ?>>Perempuan</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success btn-block">edit data</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>