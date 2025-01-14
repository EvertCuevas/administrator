<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Registro de Estudiantes</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Datos para Busqueda</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form>
          <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-3">
              <!-- text input -->
              <div class="form-group">  
                    <input type="text" id="searchInput" class="form-control"  placeholder="Escribe para buscar...">            
                  </div>
            </div>
            <div class="col-sm-3">
              <!-- text input -->
              <div class="form-group">
                <button type="submit" class="btn btn-warning">Registrar Nuevo</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Ultimos registros</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          </button>
        </div>
      </div>
      <div class="card-body">
      <!-- Default box -->
        <table class="table table-head-fixed text-nowrap">
          <thead>
          <tr>
            <th style="text-align: center;">Nombre de Estudiante</th>
            <th style="text-align: center;">Curso</th>
            <th style="text-align: center;">Nuevo estudiante</th>
            <th style="text-align: center;">Anualidad Estudiante</th>
            <th style="text-align: center;">Mensualidades canceladas</th>
            <th style="text-align: center;">Opciones</th>
          </tr>
          </thead>
          <tbody id="cuerpoTabla" >
            
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>