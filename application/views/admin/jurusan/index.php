<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-lg-12">

      <div class="card shadow">
        <div class="card-header">Kelola Data Jurusan</div>
        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-lg-3"><a href="<?= base_url('Admin/tambah_jurusan'); ?>" class="btn btn-primary btn-block">Tambah Data</a></div>
          </div>
          <hr>
          <?= $this->session->flashdata('message'); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID Jurusan</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($jurusan as $row) { ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['id_jurusan']; ?></td>
                    <td><?= $row['nama_jurusan']; ?></td>
                    <td class="text-center"><a href="<?= base_url('Admin/edit_jurusan/' . $row['id_jurusan']); ?>" class="text-warning"><i class="fas fa-edit"></i></a></td>
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