<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card shadow">
        <div class="card-header text-muted">Jadwal Pelajaran Detail</div>
        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-lg-3"><a href="<?= base_url('Admin/tambah_jadwal_pelajaran_detail'); ?>" class="btn btn-primary">tambah data</a></div>
          </div>
          <hr>
          <?= $this->session->flashdata('message'); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kelas</th>
                  <th scope="col">Pelajaran</th>
                  <th scope="col">Hari</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($jadwal_pelajaran_detail as $row) { ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['nama_kelas'] ?></td>
                    <td><?= $row['nama_pelajaran'] ?></td>
                    <td><?= $row['hari'] ?></td>
                    <td class="text-center"><a href="<?= base_url('Admin/edit_jadwal_pelajaran_detail/' . $row['id_jadwal_pelajaran_detail']); ?>" class="text-warning"><i class="fas fa-edit"></i></a></td>
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