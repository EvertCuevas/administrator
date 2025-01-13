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
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nombre de Estudiante</th>
            <th>Curso</th>
            <th>Nuevo estudiante</th>
            <th>Anualidad Estudiante</th>
            <th>Mensualidades canceladas</th>
            <th>Opciones</th>
          </tr>
          </thead>
          <tbody id="resultsTable" >
            
          </tbody>
          <tfoot>
          <tr>
          <th>Nombre de Estudiante</th>
            <th>Curso</th>
            <th>Nuevo estudiante</th>
            <th>Anualidad Estudiante</th>
            <th>Mensualidades canceladas</th>
            <th>Opciones</th>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Detectar cuando el usuario escribe en el input
        $('#searchInput').on('input', function() {
            var searchQuery = $(this).val(); // Obtener el valor escrito
        
            // Hacer la solicitud AJAX
            $.ajax({
                url: '<?php echo site_url('tran-list-estudiante'); ?>', // Cambia la URL si es necesario
                method: 'GET',
                data: { query: searchQuery },
                success: function(data) {
                    console.log(data); // Verifica la respuesta para saber si se reciben los datos correctos
                    
                    // Limpiar el tbody de la tabla
                    $('#resultsTable').empty();
        
                    // Verificar si la respuesta tiene las filas y agregarlas al tbody
                    if (data.rows) {
                        $('#resultsTable').append(data.rows);  // Agregar las filas HTML al tbody
                    } else {
                        console.log("No se encontraron resultados.");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error en la solicitud AJAX: ", error);
                }
            });
        });
    });
</script>