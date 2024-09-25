<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg" style="background-color:#3066BE;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <div class="dropdown-menu dropdown-list dropdown-menu-right"></div>
          <div class="dropdown-menu dropdown-list dropdown-menu-right"></div>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <!-- <img alt="image" src="<?php echo base_url('assets') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
              <div class="d-sm-none d-lg-inline-block"><?php echo $this->session->userdata('nama_pengguna') ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a href="<?php echo site_url('login/logout');?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> -->
              <a onclick="logoutConfirm('<?php echo site_url('login/logout') ?>')" 
                  href="#!" class="dropdown-item has-icon text-danger "><i class="fas fa-sign-out-alt"></i>Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <!-- <a href="index.html">Stisla</a> -->
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('bendahara/CBendahara')?>">
                <div class="sidebar-brand-icon">
                <img src="<?php echo base_url('/assets/images/favicon.png') ?>" alt="" width="40">
                </div>
                 <p >Monitoring Realisasi Anggaran</p>
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <img src="<?php echo base_url('/assets/images/favicon.png') ?>" alt="" width="40">
          </div>
          <ul class="sidebar-menu">
              </li>
              <!-- <li class="menu-header">Starter</li> -->
              <!-- <li class="nav-item <?php echo $this->uri->segment(2) == 'CBendahara' ? 'active' : '' ?>"><a class="nav-link" href="<?php echo base_url('bendahara/CBendahara')?>"><i class="fas fa-tasks"></i> <span>Kegiatan</span></a></li> -->
              <li class="nav-item active"><a class="nav-link" href="<?php echo base_url('bendahara/CBendahara')?>"><i class="fas fa-clipboard-list"></i> <span>Kegiatan</span></a></li>

        </aside>
      </div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin logout?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Klik tombol Logout jika anda yakin, klik tombol Tidak jika tidak yakin</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a id="btn-logout" class="btn btn-danger" href="<?= site_url('login/logout') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<script>
    function logoutConfirm(url) {
        $('#btn-logout').attr('href', url);
        $('#logoutModal').modal();
    }
</script>