<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <a href="<?= base_url('Admin/jadwal_pelajaran'); ?>" class="btn btn-info">Kembali</a>
      <div class="card shadow">
        <div class="card-header text-muted">Tambah Jadwal Pelajaran</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="id_pelajaran">Mata Pelajaran</label>
              <select class="form-control" name="id_pelajaran" id="id_pelajaran">
                <?php foreach ($mata_pelajaran as $row) { ?>
                  <option value="<?= $row['id_pelajaran']; ?>"><?= $row['nama_pelajaran']; ?></option>
                <?php } ?>
              </select>
              <?= form_error('id_pelajaran', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label for="id_kelas">Kelas</label>
              <select class="form-control" name="id_kelas" id="id_kelas">
                <?php foreach ($kelas as $row) { ?>
                  <option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?></option>
                <?php } ?>
              </select>
              <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
              <label for="nip">Pengajar</label>
              <select class="form-control" name="nip" id="nip">
                <?php foreach ($pengajar as $row) { ?>
                  <option value="<?= $row['nip']; ?>"><?= $row['nama']; ?></option>
                <?php } ?>
              </select>
              <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-success btn-block mt-3">Submit</button>
          </form>
        </div>
      </div>