<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <a href="<?= base_url('Admin/pengajar'); ?>" class="btn btn-info">Kembali</a>
      <div class="card shadow">
        <div class="card-header text-muted">Edit Pengajar</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="nip">NIP</label>
              <input type="text" name="nip" id="nip" class="form-control" autocomplete="off" value="<?= $pengajar['nip']; ?>">
              <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="nama">Nama Pengajar</label>
              <input type="text" name="nama" id="nama" class="form-control" autocomplete="off" value="<?= $pengajar['nama']; ?>">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="agama">Agama</label>
              <select name="id_agama" id="agama" class="form-control">
                <?php foreach ($agama as $row) { ?>
                  <option value="<?= $row['id_agama']; ?>" <?= selected_agama($pengajar['id_agama'], $row['id_agama']); ?>><?= $row['nama_agama']; ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>