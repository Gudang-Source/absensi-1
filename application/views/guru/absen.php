<div class="container-fluid">

  <p class="text-center"><a class="btn btn-info" href="<?= base_url('Guru/index'); ?>">kembali</a></p>
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">JK</th>
                <th scope="col">Absen</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php date_default_timezone_set('Asia/Jakarta'); ?>
              <?php foreach ($siswa as $row) { ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $row['nis']; ?></td>
                  <td><?= $row['nama']; ?></td>
                  <td style="width: 50px;"><?= $row['jenis_kelamin']; ?></td>
                  <td>
                    <div class="form-group">
                      <input type="text" name="" class="absen-siswa form-control" data-nis="<?= $row['nis']; ?>" data-id="<?= $this->uri->segment(3); ?>" value="<?= value_absen($row['nis'], $profile['nip'], date('Y-m-d')); ?>">
                    </div>
                  </td>
                </tr> 
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card mb-3">
        <div class="card-header text-muted">Absensi Siswa Kelas <?= $siswa[0]['nama_kelas']; ?></div>
        <div class="card-body">
          <?php setlocale(LC_ALL, 'IND'); ?>
          <h3 clas=""><?= strftime('%d %B %Y'); ?></h3>
          <h4 class="text-muted mb-5" id="jam">--:--</h4>
          <p><?= $jadwal_pelajaran['nama_pelajaran']; ?></p>
          <p>Jam : <?= $jadwal_pelajaran['jam_mulai']; ?> - <?= $jadwal_pelajaran['jam_selesai']; ?></p>
        </div>
      </div>
    </div>

  </div>
</div>