<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <a href="<?= base_url('Admin/kelas'); ?>" class="btn btn-info">Kembali</a>
      <div class="card shadow">
        <div class="card-header text-muted">Tambah kelas</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="id_kelas">ID Kelas</label>
              <input type="text" name="id_kelas" id="id_kelas" class="form-control" autocomplete="off" value="<?= set_value('id_kelas'); ?>">
              <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <select name="id_jurusan" id="jurusan" class="form-control">
                <?php foreach ($jurusan as $row) { ?>
                  <option value="<?= $row['id_jurusan']; ?>"><?= $row['nama_jurusan']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nama_kelas">Nama Kelas</label>
              <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" autocomplete="off" value="<?= set_value('nama_kelas'); ?>">
              <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>