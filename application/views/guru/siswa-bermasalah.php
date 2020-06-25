<div class="container">
  <p class="text-center"><a href="<?= base_url('Guru'); ?>" class="btn btn-info">kembali</a></p>

  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card">
        <div class="card-header">Lapor siswa bermasalah</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="nis">NIS</label>
              <input type="text" name="nis" id="nis" class="form-control" autocomplete="off">
              <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
            <label for="keterangan">Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
              <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <button type="submit" class="btn btn-primary btn-block">kirim</button>
          </form>
        </div>
      </div>
    
    </div>
  </div>
</div>