<div class="container-fluid">

  <div class="row justify-content-center">
    <div class="col-lg-12">

      <div class="card shadow">
        <div class="card-header">Kelola Data Pengajar</div>
        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-lg-3"><a href="<?= base_url('Admin/tambah_pengajar'); ?>" class="btn btn-primary btn-block">Tambah Data</a></div>
          </div>
          <hr>
          <?= $this->session->flashdata('message'); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIP</th>
                  <th scope="col">Nama Pengajar</th>
                  <th scope="col">Agama</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pengajar as $row) { ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['nip']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nama_agama']; ?></td>
                    <td class="text-center"><a href="<?= base_url('Admin/edit_pengajar/' . $row['nip']); ?>" class="text-warning"><i class="fas fa-edit"></i></a></td>
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