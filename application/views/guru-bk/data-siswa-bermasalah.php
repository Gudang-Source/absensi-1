<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
    <p class="text-center"><a href="<?= base_url('Guru_BK'); ?>" class="btn btn-info">kembali</a></p>
      <div class="card">
        <div class="card-header">Data siswa bermasalah</div>
        <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">nis</th>
              <th scope="col">nama</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 1; ?>
          <?php foreach($siswa_bermasalah as $row) { ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $row['nis']; ?></td>
              <td><?= $row['nama']; ?></td>
              <td><a href="<?= base_url('Guru_BK/siswa_bermasalah_detail/' . $row['id_siswa_bermasalah']); ?>" class="badge badge-primary">detail</a></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

        </div>
      </div>

    </div>
  </div>
</div>