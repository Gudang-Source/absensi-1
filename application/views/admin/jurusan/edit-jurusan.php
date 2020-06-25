<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <a href="<?= base_url('Admin/jurusan'); ?>" class="btn btn-info">Kembali</a>
      <div class="card shadow">
        <div class="card-header text-muted">Edit Jurusan</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="id_jurusan">ID Jurusan</label>
              <input type="text" name="id_jurusan" id="id_jurusan" class="form-control" autocomplete="off" value="<?= $jurusan['id_jurusan']; ?>" readonly>
              <?= form_error('id_jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nama_jurusan">Nama Jurusan</label>
              <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" autocomplete="off" value="<?= $jurusan['nama_jurusan']; ?>">
              <?= form_error('nama_jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>