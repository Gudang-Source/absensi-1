<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-lg-12">

      <div class="card shadow">
        <div class="card-header">Kelola Data Mata Pelajaran</div>
        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-lg-3"><a href="<?= base_url('Admin/tambah_mata_pelajaran'); ?>" class="btn btn-primary btn-block">Tambah Data</a></div>
          </div>
          <hr>
          <?= $this->session->flashdata('message'); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID Mata Pelajaran</th>
                  <th scope="col">Nama Mata Pelajaran</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mata_pelajaran as $row) { ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['id_pelajaran']; ?></td>
                    <td><?= $row['nama_pelajaran']; ?></td>
                    <td class="text-center"><a href="<?= base_url('Admin/edit_mata_pelajaran/' . $row['id_pelajaran']); ?>" class="text-warning"><i class="fas fa-edit"></i></a></td>
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