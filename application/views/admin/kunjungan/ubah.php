<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title; ?></h1>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <?= form_open('admin/kunjungan/ubah/'. $kunjungan['id_berobat']); ?>
          <div class="form-group">
            <label for="bayi">Nama Bayi</label>
            <select name="bayi" id="bayi" class="form-control">
              <option value="">-- Pilih Bayi --</option>
              <?php foreach($bayi as $p) : ?>
                <?php if($p['id_bayi'] == $kunjungan['id_bayi']) : ?>
                <option value="<?= $p['id_bayi']; ?>" selected><?= $p['nama_bayi']; ?></option>
                <?php else : ?>
                  <option value="<?= $p['id_bayi']; ?>"><?= $p['nama_bayi']; ?></option>
              <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <small class="muted text-danger"><?= form_error('bayi'); ?></small>
          </div>
          <div class="form-group">
            <label for="petugas">Nama Petugas</label>
            <select name="petugas" id="petugas" class="form-control">
              <option value="">-- Pilih Petugas --</option>
              <?php foreach($petugas as $d) : ?>
                <?php if($d['id_petugas'] == $kunjungan['id_petugas']) : ?>
                <option value="<?= $d['id_petugas']; ?>" selected><?= $d['nama_petugas']; ?></option>
                <?php else : ?>
                  <option value="<?= $d['id_petugas']; ?>"><?= $d['nama_petugas']; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <small class="muted text-danger"><?= form_error('petugas'); ?></small>
          </div>
          <div class="form-group">
            <label for="tgl">Tanggal Berobat</label>
            <input type="date" name="tgl" id="tgl" class="form-control" value="<?= $kunjungan['tgl_berobat']; ?>">
            <small class="muted text-danger"><?= form_error('tgl'); ?></small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-dark">Ubah</button>
          </div>
          <?= form_close(); ?> 
        </div>
      </div>
    </div>
  </div>
</main>