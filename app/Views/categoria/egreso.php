<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Registro Asiento de Egreso</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Formulario Registro de Asiento de Egreso</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form id="myForm" action="<?= base_url()?>cat_asi_registro" method="post">
          <div class="row">
            <div class="col-sm-3">
              <!-- text input -->
              <div class="form-group">
                <label>Categoria Asiento:</label>
                <select class="form-control select2" style="width: 100%;" name="id_categoria" required>
                  <?php if($lista_Categoria){ ?>
                    <option selected disabled value="">Seleccionar Categoria</option>
                  
                    <?php foreach ($lista_Categoria as $Categoria){ 
                    ?>
                      <option value="<?= $Categoria->ID_CATEGORY ?>"><?php echo $Categoria->NAME_CATEGORY ?></option>
                    <?php } 
                      } else{ ?>
                      <option selected disabled value="">Registre Categoria</option>
                    <?php } ?>    
                </select>
                  <!-- <input type="text" class="form-control" placeholder="Seleccione Categoria"> -->
              </div>
            </div>
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Nombre de Asiento:</label>
                <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nom_asiento" required>
              </div>
            </div>
            <div class="col-sm-3">
              <!-- text input -->
              <div class="form-group">
                <label>Codigo de Asiento:</label>
                <input type="text" class="form-control" placeholder="Ingrese Código" name="cod_asiento" required>
              </div>
            </div>
          </div>
          <div class="row" style="text-align: center;">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
              <div class="form-group">
                <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">Registrar Categoria</button>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <button id="submitButton" type="submit" class="btn btn-warning">Registrar Asiento</button>
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

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Registro de Asientos de Egreso</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          </button>
        </div>
      </div>
      <div class="card-body">
      <!-- Default box -->
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Nombre de Categoria</th>
            <th>Nombre de Asiento</th>
            <th>Código de Asiento</th>
          </tr>
          </thead>
          <tbody>
          <?php if($list_asiento){
            $cont=1;
            foreach ($list_asiento as $asiento){ 
          ?>
              <tr>
                <td style="text-align:center;"><?= $cont ?></td>
                <td><?= $asiento->NAME_CATEGORY ?></td>
                <td><?= $asiento->NAME_SEAT ?></td>
                <td style="text-align:center;"><?= $asiento->COD_SEAT ?></td>
              </tr>

          <?php
            $cont++; } 
            } else{ ?>
            <td>Sin registro</td>
            <td>Sin registro</td>
            <td>Sin registro</td>
            <td>Sin registro</td>
          <?php } ?>
          
          </tbody>
          <tfoot>
          <tr>
            <th>#</th>
            <th>Nombre de Categoria</th>
            <th>Nombre de Asiento</th>
            <th>Código de Asiento</th>
          </tr>
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
      <form action="<?= base_url()?>cat_registro" method="post">
        <div class="modal-header"  style="background-color: #FCD145">
          <h4 class="modal-title">Registro de Categoria</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nombre de Categoria:</label>
            <input type="hidden" class="form-control" value="2" name="id_nivel">
            <input type="text" class="form-control" name="nom_categoria" placeholder="Ingrese Nombre de Categoria">
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

