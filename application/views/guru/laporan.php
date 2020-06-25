<div class="container-fluid">
  <div class="row justify-content-center">

    <div class="col-lg-10">
      <p class="text-center"><a href="<?= base_url('Guru/index'); ?>" class="btn btn-info">kembali</a></p>
      <div class="card">
        <div class="card-header text-muted">
          <div class="row justify-content-between">
            <div class="col-lg-5">Absen harian kelas XII RPL 1</div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NIS</th>
                  <th scope="col">Nama</th>
                  <th scope="col">JK</th>
                  <th scope="col"><?= date('d/m', strtotime($tgl)); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($siswa as $row) { ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td style="width: 125px"><?= $row['nis']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td style="width: 50px;"><?= $row['jenis_kelamin']; ?></td><?= cek_absen_guru($row['nis'], $profile['nip'], $tgl); ?>
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