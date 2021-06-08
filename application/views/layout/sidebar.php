<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?= base_url('dashboard'); ?>"><i class="fas fa-clinic-medical"></i> Posyandu Flamboyan</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Keluar</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link<?= $this->uri->segment(1) == 'dashboard' ? ' active' : '' ?>" href="<?= base_url('dashboard'); ?>">
              <i class="fas fa-tachometer-alt"></i>
              Dashboard
            </a>
          </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Master Data</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            </a>
          </h6>
          <li class="nav-item">
            <a class="nav-link<?= $this->uri->segment(2) == 'users' ? ' active' : '' ?>" href="<?= base_url('admin/users'); ?>">
              <i class="fas fa-users"></i>
              Data Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?= $this->uri->segment(2) == 'petugas' ? ' active' : '' ?>" href="<?= base_url('admin/petugas'); ?>">
              <i class="fas fa-user-md"></i>
              Data Petugas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?= $this->uri->segment(2) == 'bayi' ? ' active' : '' ?>" href="<?= base_url('admin/bayi'); ?>">
              <i class="fa fa-baby"></i>
              Data Bayi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?= $this->uri->segment(2) == 'imunisasi' ? ' active' : '' ?>" href="<?= base_url('admin/imunisasi'); ?>">
              <i class="fas fa-pills"></i>
              Data Imunisasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?= $this->uri->segment(2) == 'obat' ? ' active' : '' ?>" href="<?= base_url('admin/obat'); ?>">
              <i class="fas fa-pills"></i>
              Data Obat
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?= $this->uri->segment(2) == 'kunjungan' ? ' active' : '' ?>" href="<?= base_url('admin/kunjungan'); ?>">
              <i class="fas fa-book-medical"></i>
              Kunjungan
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Laporan</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('laporan/petugas'); ?>">
              <i class="fas fa-notes-medical"></i>
              Laporan Petugas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('laporan/bayi'); ?>">
              <i class="fas fa-notes-medical"></i>
              Laporan Bayi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('laporan/imunisasi'); ?>">
              <i class="fas fa-notes-medical"></i>
              Laporan Imunisasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('laporan/kunjungan'); ?>">
              <i class="fas fa-notes-medical"></i>
              Laporan Kunjungan
            </a>
          </li>
        </ul>
      </div>
    </nav>