<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title; ?></h1>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <?= form_open('admin/bayi/ubah/'. $bayi['id_bayi']); ?>
          <input type="hidden" name="id_bayi" class="form-control" value="<?= $bayi['id_bayi']; ?>">
          <div class="form-group">
            <label for="nama">Nama Bayi</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $bayi['nama_bayi']; ?>">
            <small class="muted text-danger"><?= form_error('nama'); ?></small>
          </div>
          <div class="form-group">
            <label for="jk">Nama Bayi</label>
            <select name="jk" id="jk" class="form-control">
              <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="L" <?php if($bayi['jk_bayi'] == 'L'){echo "selected";} ?>>Laki-Laki</option>
                <option value="P" <?php if($bayi['jk_bayi'] == 'P'){echo "selected";} ?>>Perempuan</option>
            </select>
            <small class="muted text-danger"><?= form_error('jk'); ?></small>
          </div>
          <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" name="umur" id="umur" class="form-control" value="<?= $bayi['umur_bayi']; ?>">
            <small class="muted text-danger"><?= form_error('umur'); ?></small>
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