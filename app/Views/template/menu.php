
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" style="color: #003D99;">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="color: #003D99;">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <li class="nav-item">
          <a href="<?= base_url()?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Inicio
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Plataforma
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url()?>/plataforma" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Gestión</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>
              Categoria
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url()?>/cat-ingreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Ingreso</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>/cat-egreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Egreso</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-dollar-sign"></i>
            <p>
              Transacción
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url()?>/tran-ingreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Ingreso</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>/tran-egreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Egreso</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>/tran-aporte" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Aporte Voluntario</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>
              Reporte
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url()?>/rep-mensualidad" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Mensualidad</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>/rep-general" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>General</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>/rep-mensual" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Mensual</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa solid fas fa-question"></i>
            <p>
              Consulta
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url()?>/cons-recibo" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Recibo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>/cons-aporte" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Aporte</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Usuario
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url()?>/us-estudiante" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Estudiante</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>/us-admin" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Administrador</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>