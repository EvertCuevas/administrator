<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Formulario Registro de Movimiento de Egreso</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Formulario de Registro</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="<?= base_url()?>tran-reg-ingreso" method="post">
          <input type="hidden" value="2" name="id_nivel">
          <div class="row">
            <div class="col-sm-3">
              <!-- text input -->
              <div class="form-group">
                <label>Categoria:</label>
                <select id="idCategoria" class="form-control select2" style="width: 100%;" required>
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
                <select id="idAsiento" class="form-control select2" style="width: 100%;" name="cod_asiento" required>
                  <option selected disabled value="">Seleccione Categoria</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <!-- text input -->
              <div class="form-group">
                <label>Institución:</label>
                <select class="form-control select2" style="width: 100%;" name="cod_institucion" required>
                  <?php if($lista_Institucion){ ?>
                  <option selected disabled value="">Seleccionar Institución</option>
                  <?php foreach ($lista_Institucion as $institucion){ 
                  ?>
                    <option value="<?= $institucion->ID_SCHOOL ?>"><?php echo $institucion->NAME_SCHOOL ?></option>
                  <?php } 
                    } else{ ?>
                    <option selected disabled value="">Registre institucion</option>
                  <?php } ?>   
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <!-- text input -->
              <div class="form-group">
                <label>Nombre Completo:</label>
                <input type="text" class="form-control" placeholder="Ingrese Nombres y Apellidos" name="nombre" required>
                <!-- <input type="text" class="form-control" placeholder="Seleccione Categoria"> -->
              </div>
            </div>
            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label>CI:</label>
                <input type="text" class="form-control" placeholder="Ingrese CI" name="ci_nombre" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <!-- text input -->
              <div class="form-group">
              <label>Descripción:</label>
              <textarea class="form-control" rows="4" placeholder="Seleccione" name="descripcion" required></textarea>          
              </div>
            </div>
            <div class="col-sm-4">
              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tipo de Pago:</label>
                    <select class="form-control select2" style="width: 100%;" name="tipo" required>
                      <option selected disabled value="">Seleccione Tipo</option>
                      <option value="Efectivo">Efectivo</option>
                      <option value="Cheque">Cheque</option>
                      <option value="Tranferencia">Tranferencia</option>
                      <option value="Otros">Otros</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Monto a Cancelar:</label>
                    <input type="number" step="any" class="form-control" placeholder="Ingrese Monto" name="monto" required>                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="text-align: center;">
            <div class="col-sm-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Registrar Egreso</button>
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
        <h3 class="card-title">Ultimos registros de Egresos</h3>

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
            <th># Recibo</th>
            <th>Nombre</th>
            <th>N° de CI</th>
            <th>Descripción</th>
            <th>Monto Cancelado</th>
            <th>opcion</th>
          </tr>
          </thead>
          <tbody>
          <?php if($lista_Recibo){
            $cont=1;
            foreach ($lista_Recibo as $lista){ 
          ?>
              <tr>
                <td style="text-align:center;"><?= $lista->NUMBER_RECEIPT ?></td>
                <td><?= $lista->CARRIER_RECEIPT ?></td>
                <td><?= $lista->CI_CARRIER_RECEIPT ?></td>
                <td><?= $lista->DESCRIPTION_RECEIPT ?></td>
                <td style="text-align:center;"><?= $lista->AMOUNT_RECEIPT ?></td>
                <td style="text-align:center;"><a href="<?= base_url('reporte_recibo/'.$lista->NUMBER_RECEIPT.'/2') ?>" target="_blank"><button class="btn btn-warning">IMPRIMIR</button></a></td>
              </tr>

          <?php
            $cont++; } 
            } else{ ?>
            <td>Sin registro</td>
            <td>Sin registro</td>
            <td>Sin registro</td>
            <td>Sin registro</td>
            <td>Sin registro</td>
            <td>Sin registro</td>
          <?php } ?>
          
          </tbody>
          <tfoot>
          <tr>
            <th>N° de Recibo</th>
            <th>Nombre</th>
            <th>N° de CI</th>
            <th>Descripción</th>
            <th>Monto Cancelado</th>
            <th>opcion</th>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">   
  $(document).ready(function() {
    $("#idCategoria").change(function() {
        $("#idCategoria option:selected").each(function() {
            var idCategoria = $(this).val();
            $.post("<?php echo base_url();?>cat-list-siento", {
                idCategoria : idCategoria
            }, function(data) {
                $("#idAsiento").html(data);
            });
        });
    });
  });
</script>