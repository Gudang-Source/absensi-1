<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-7">

      <div class="card shadow">
        <div class="card-header">Kelola data jadwal piket</div>
        <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">no.</th>
                  <th scope="col">hari</th>
                  <th scope="col">nama guru</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($guru_piket as $row) { ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= hari($row['hari']); ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td class="text-center"><a href="<?= base_url('Admin/edit_jadwal_piket/' . $row['id_jadwal_piket']); ?>" class="text-warning"><i class="fas fa-edit"></i></a></td>
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