<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $title; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#formModalKunjungan">
        <i class="fas fa-plus"></i> Tambah Data Kunjungan
      </button>
      <a href="<?= base_url('laporan/kunjungan'); ?>" target="_blank" class="btn btn-secondary mb-2"><i class="fas fa-print"></i></a>
      <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
      <?php endif; ?>
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>ID Bayi</td>
                  <td>Bayi</td>
                  <td>Umur</td>
                  <td>Petugas</td>
                  <td>Tindakan Medis</td>
                  <td>Aksi</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($kunjungan as $u) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u['tgl_berobat']; ?></td>
                    <td><?= $u['id_bayi']; ?></td>
                    <td><?= $u['nama_bayi']; ?></td>
                    <td><?= $u['umur_bayi']; ?></td>
                    <td><?= $u['nama_petugas']; ?></td>
                    <td>
                      <a href="<?= base_url('admin/kunjungan/tindakan/' . $u['id_berobat']); ?>" class="btn btn-success btn-sm">Tindakan</a>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/kunjungan/ubah/') . $u['id_berobat']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('admin/kunjungan/hapus/') . $u['id_berobat']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="formModalKunjungan" tabindex="-1" aria-labelledby="formModalLabelKunjungan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelKunjungan">Tambah Data Kunjungan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('admin/kunjungan'); ?>
        <div class="form-group">
          <label for="bayi">Bayi</label>
          <select name="bayi" id="bayi" class="form-control">
            <option value="">-- Pilih Bayi --</option>
            <?php foreach($bayi as $p) : ?>
              <option value="<?= $p['id_bayi']; ?>"><?= $p['nama_bayi']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="muted text-danger"><?= form_error('bayi'); ?></small>
        </div>
        <div class="form-group">
          <label for="petugas">Petugas</label>
          <select name="petugas" id="petugas" class="form-control">
            <option value="">-- Pilih Petugas --</option>
            <?php foreach($petugas as $d) : ?>
              <option value="<?= $d['id_petugas']; ?>"><?= $d['nama_petugas']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="muted text-danger"><?= form_error('petugas'); ?></small>
        </div>
        <div class="form-group">
          <label for="tgl">Tanggal berobat</label>
          <input type="date" name="tgl" id="tgl" class="form-control">
          <small class="muted text-danger"><?= form_error('tgl'); ?></small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Tambah</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>