<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Registro Aporte Voluntario</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Información de Estudiante</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Curso:</label>
                      <select class="form-control select2" style="width: 100%;">
                      <option selected disabled value="">Seleccionar Categoria</option>
                          <option>Ingresos</option>
                          <option>Otros Ingresos</option>
                        </select>
                        <!-- <input type="text" class="form-control" placeholder="Seleccione Categoria"> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Estudiante:</label>
                      <select class="form-control select2" style="width: 100%;">
                      <option selected disabled value="">Seleccionar Categoria</option>
                          <option>Ingresos</option>
                          <option>Otros Ingresos</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Señor(es)</label>
                      <input type="text" class="form-control" placeholder="Ingrese Código">
                    </div>
                  </div>
                </div>
                <div class="row" style="text-align: center;">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Registrar Mensualidad</button>
                    </div>
                  </div>
                  <div class="col-sm-2"></div>
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
      </div>
      <div class="col-md-6">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registro de Aportes Pendientes</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 10px; text-align: center">Cancelar</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td style="text-align: center">
                          <input type="checkbox">
                        </td>
                        <td>Marzo</td>
                        <td>50 Bs.</td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td style="text-align: center">
                          <input type="checkbox">
                        </td>
                        <td>Abril</td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td style="text-align: center">
                          <input type="checkbox">
                        </td>
                        <td>MAyo</td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td style="text-align: center">
                          <input type="checkbox">
                        </td>
                        <td>Junio</td>
                      </tr>
                    </tbody>
                  </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
      </div>
    </div>
</section>
</div>
