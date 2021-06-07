<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?= $this->session->flashdata('pesan'); ?>
      <div class="card">
        <div class="card-header bg-dark text-white font-weight-bold text-center">Biodata Bayi</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>ID Bayi</th>
                <td><?= $d['id_bayi']; ?></td>
              </tr>
              <tr>
                <th>Nama Bayi</th>
                <td><?= $d['nama_bayi']; ?></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td><?= $d['jk_bayi'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
              </tr>
              <tr>
                <th>Umur</th>
                <td><?= $d['umur_bayi']; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="card mt-4">
        <div class="card-header bg-dark text-white font-weight-bold text-center">Riwayat berobat</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl berobat</th>
                  <th>tindakan</th>
                  <th>Diagnosa</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($riwayat as $r) : ?>
                   <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $r['tgl_berobat']; ?></td>
                     <td><?= $r['tindakan']; ?></td>
                     <td><?= $r['diagnosa']; ?></td>
                   </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-dark text-white font-weight-bold text-center">Catatan Tindakan Medis</div>
        <div class="card-body">
          <?= form_open('admin/kunjungan/tambahtindakan'); ?>
          <input type="hidden" name="id_berobat" required value="<?= $d['id_berobat']; ?>">
          <div class="form-group">
            <label for="tindakan">tindakan</label>
            <textarea name="tindakan" required id="tindakan" class="form-control"><?= $d['tindakan']; ?></textarea>
            <small class="muted text-danger"><?= form_error('tindakan'); ?></small>
          </div>
          <div class="form-group">
            <label for="diagnosa">Diagnosa</label>
            <input type="text" name="diagnosa" required id="diagnosa" class="form-control" value="<?= $d['diagnosa']; ?>">
            <small class="muted text-danger"><?= form_error('diagnosa'); ?></small>
          </div>
          <div class="form-group">
            <small class="muted text-danger"><?= form_error('penata'); ?></small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-dark">Simpan</button>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
      <div class="card mt-4">
        <div class="card-header bg-dark text-white font-weight-bold text-center">Resep imunisasi</div>
        <div class="card-body">
          <?= form_open('admin/kunjungan/tambahResep'); ?>
          <input type="hidden" name="id_berobat" value="<?= $d['id_berobat']; ?>">
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <label for="imunisasi">imunisasi</label>
                <select name="imunisasi" required id="imunisasi" class="form-control">
                  <option value="">-- Pilih imunisasi --</option>
                  <?php foreach($imunisasi as $o) : ?>
                     <option value="<?= $o['id_imunisasi']; ?>"><?= $o['nama_imunisasi']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <button type="submit" class="btn btn-dark mt-4"><i class="fas fa-plus-circle"></i></button>
              </div>
            </div>
          <?= form_close(); ?>
          </div>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>No</th>
                <th>Nama imunisasi</th>
                <th><i class="fas fa-cogs"></i></th>
              </tr>
              <?php $no = 1; foreach($resep as $r) : ?>
                 <tr>
                   <td><?= $no++; ?></td>
                   <td><?= $r['nama_imunisasi']; ?></td>
                   <td>
                     <a href="<?= base_url('admin/kunjungan/hapusResep/' . $r['id_resep'] . '/' . $r['id_berobat']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')"><i class="fas fa-trash"></i></a>
                   </td>
                 </tr>
              <?php endforeach; ?>
            </table>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
</main>

