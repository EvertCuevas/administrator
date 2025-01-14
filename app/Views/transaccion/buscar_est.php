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
                <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-warning">Registrar Estudiantre Nuevo</button>
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
<!-- /.modal -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">      
      <form action="<?= base_url()?>tran-reg-estudiante" method="post">
        <input type="hidden" value="1" name="gestion">
        <div class="modal-header"  style="background-color: #FCD145">
          <h4 class="modal-title">Registro de Estudiante Nuevo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Curso:</label>
            <input type="hidden" class="form-control" value="1" name="curso">
            <select class="form-control select2" style="width: 100%;" name="curso" required>
              <?php if($lista_Curso){ ?>
                <option selected disabled value="">Seleccionar Categoria</option>
              
                <?php foreach ($lista_Curso as $lista){ 
                ?>
                  <option value="<?= $lista->ID_GRADE ?>"><?php echo $lista->NAME_GRADE ?></option>
                <?php } 
                  } else{ ?>
                  <option selected disabled value="">Registrar Cursos</option>
                <?php } ?>    
            </select>
          </div>
          <div class="form-group">
            <label>Nombres:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre(s) del Estudiante">
          </div>
          <div class="form-group">
            <label>Apellidos:</label>
            <input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido(s) del Estudiante">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>CI Estudiante:</label>
                <input type="text" class="form-control" name="ci" placeholder="Ingrese CI del Estudiante">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>RUDE:</label>
                <input type="text" class="form-control" name="rude" placeholder="Ingrese RUDE del Estudiante">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Estudiante Nuevo:</label>
                <select class="form-control select2" style="width: 100%;" name="est_nuevo" required>
                  <option selected disabled value="0">Seleccione una Opción</option> 
                  <option value="0">No Corresponde</option> 
                  <option value="1">Pendiente</option> 
                  <option value="2">Cancelado</option> 
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Anualidad:</label>
                <select class="form-control select2" style="width: 100%;" name="anualidad" required>
                  <option selected disabled value="0">Seleccione una Opción</option> 
                  <option value="1">Pendiente</option> 
                  <option value="2">Cancelado</option> 
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>mensualiodades Canceladas:</label>
            <input type="number" class="form-control" name="mensualidad" value="0" placeholder="Ingrese Cantidad de Mensualidades">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->