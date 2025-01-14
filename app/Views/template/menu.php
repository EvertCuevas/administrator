
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
  <div class="brand-link">
    <img src="<?= base_url() ?>assets/dist/img/salesiano.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <h4 class="h2"><strong>SIS</strong> Admin</h4>
</div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <h6><strong><?php echo session()->get('nombre'); ?></strong></h6>
      </div>
    </div>
    <?php 
    // Recuperar el array desde la sesión
    $permise = session()->get('permisos'); // Obtén el array de permisos desde la sesión
    if($permise ){?>
      <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <?php  
        // Verificar si el valor 1 está en el array
        if (in_array(1, $permise)) { 
        ?>
        <li class="nav-item">
          <a href="<?= base_url()?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Inicio
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <?php } ?>
        
        <?php  
        // Verificar si el valor 2 está en el array
        if (in_array(2, $permise)) { 
        ?>
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
              <a href="<?= base_url()?>plataforma" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Gestión</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Institución</p>
              </a>
            </li>
            
          </ul>
        </li>
        <?php } ?>
        
        <?php  
        // Verificar si el valor 3 está en el array
        if (in_array(3, $permise)) { 
        ?>
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
              <a href="<?= base_url()?>cat-ingreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Ingreso</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>cat-egreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Egreso</p>
              </a>
            </li>
            
          </ul>
        </li>
        <?php } ?>
        
        <?php  
        // Verificar si el valor 4 está en el array
        if (in_array(4, $permise)) { 
        ?>
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
              <a href="<?= base_url()?>tran-ingreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Ingreso</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>tran-egreso" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Egreso</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>tran-aporte" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Aporte Voluntario</p>
              </a>
            </li>
            
          </ul>
        </li>
        <?php } ?>
        
        <?php  
        // Verificar si el valor 5 está en el array
        if (in_array(5, $permise)) { 
        ?>
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
              <a href="<?= base_url()?>rep-mensualidad" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Mensualidad</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>rep-general" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>General</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>rep-mensual" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Mensual</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>
        

        <?php  
        // Verificar si el valor 6 está en el array
        if (in_array(6, $permise)) { 
        ?>
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
              <a href="<?= base_url()?>cons-recibo" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Recibo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>cons-aporte" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Aporte</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <?php  
        // Verificar si el valor 7 está en el array
        if (in_array(7, $permise)) { 
        ?>
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
              <a href="<?= base_url()?>us-estudiante" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Estudiante</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>us-admin" class="nav-link">
              <i class="nav-icon fa-solid fas fa-share"></i>
                <p>Administrador</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>
        
        <li class="nav-item">
              <a href="<?= base_url()?>logout" class="nav-link">
              <i class="nav-icon fa-solid fas fa-sign-out-alt"></i>
                <p>Cerrar Session</p>
              </a>
            </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    <?php } ?>
    
  </div>
  <!-- /.sidebar -->
</aside>