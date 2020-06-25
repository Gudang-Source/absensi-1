<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <a href="<?= base_url('Admin/mata_pelajaran'); ?>" class="btn btn-info">Kembali</a>
      <div class="card shadow">
        <div class="card-header text-muted">Edit Mata Pelajaran</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="id_pelajaran">ID Mata Pelajaran</label>
              <input type="text" name="id_pelajaran" id="id_pelajaran" class="form-control" autocomplete="off" value="<?= $mata_pelajaran['id_pelajaran']; ?>" readonly>
              <?= form_error('id_pelajaran', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nama_pelajaran">Nama Pelajaran</label>
              <input type="text" name="nama_pelajaran" id="nama_pelajaran" class="form-control" autocomplete="off" value="<?= $mata_pelajaran['nama_pelajaran']; ?>">
              <?= form_error('nama_pelajaran', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>