<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISAdmin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- script para rescatar datos dependientes de un select -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
 
  <!-- Theme style custom -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/custom.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php echo $this->include('template/menu'); ?>

    <?php echo $this->include($contenido); ?>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2025 <a href="#">ECUES</a>.</strong> All rights reserved.
    </footer>
  </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->


<!-- SweetAlert2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"],
      "language": {
        "search": "Buscar:",  // Cambiar texto del botón de búsqueda
        "zeroRecords": "No se encontraron registros", // Mensaje cuando no hay resultados
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros", // Información del número de registros mostrados
        "infoEmpty": "No hay registros disponibles",  // Mensaje cuando no hay registros
        "infoFiltered": "(filtrado de _MAX_ registros totales)"
      },
      "ordering": false 
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<?php 
// Recuperar el tipo de mensaje y el mensaje de la sesión
$toast_type = session()->getFlashdata('toast_success') ? 'success' : (session()->getFlashdata('toast_error') ? 'error' : (session()->getFlashdata('toast_warning') ? 'warning' : ''));
$toast_message = session()->getFlashdata('toast_success') ?? session()->getFlashdata('toast_error') ?? session()->getFlashdata('toast_warning');

// Limpiar los datos flash después de obtenerlos
session()->remove('toast_success');
session()->remove('toast_error');
session()->remove('toast_warning');
?>

<?php if ($toast_message): ?>
    <script>
        $(document).ready(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            // Mostrar el mensaje basado en el tipo
            Toast.fire({
                icon: '<?php echo $toast_type; ?>',
                title: '<?php echo $toast_message; ?>'
            });
        });
    </script>
<?php endif; ?>
<script>
  // Obtener el formulario y el botón de submit
  const form = document.getElementById('myForm');
  
  // Evento que se ejecuta cuando el usuario hace clic en el botón de submit
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe inmediatamente
  
    // Mostrar el cuadro de confirmación con SweetAlert2
    Swal.fire({
      title: "¿Estás seguro?",
      text: "¿Quieres enviar este formulario?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#003D99",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, enviar"
    }).then((result) => {
      // Si el usuario confirma la acción, enviar el formulario
      if (result.isConfirmed) {
        // Enviar el formulario después de la confirmación
        form.submit(); // Esto envía el formulario
      }
    });
  });
</script>

<script>
  $(document).ready(function(){
      $('#searchInput').on('input', function(){
          realizarBusqueda();
      });
  
      function realizarBusqueda() {
          var query = $('#searchInput').val();
          $.ajax({
              url: 'tran-list-estudiante',
              type: 'GET',
              data: { q: query },
              success: function(response) {
                  mostrarResultados(JSON.parse(response));
              },
              error: function(error) {
                  console.error(error);
              }
          });
      }
  
  
      function mostrarResultados(resultados) {
          var cuerpoTabla = $('#cuerpoTabla');
          cuerpoTabla.empty();
  
          $.each(resultados, function(index, resultado) {
              var fila = $('<tr>');

              // Convertir el valor de NEW_STUDENT, ANNUITY_STUDENT y MONTHLY_STUDENT
              var estadoNuevoEstudiante = convertirEstado(resultado.NEW_STUDENT);
              var estadoAnualidadEstudiante = convertirEstado(resultado.ANNUITY_STUDENT);
              var estiloNuevoEstudiante = convertirEstilo(resultado.NEW_STUDENT);
              var estiloAnualidadEstudiante = convertirEstilo(resultado.ANNUITY_STUDENT);


              fila.append($('<td>').text(resultado.NAME_STUDENT +' '+ resultado.LASTNAME_STUDENT)); // Ajusta esto según la estructura de tus datos
              fila.append($('<td>').text(resultado.NAME_GRADE)); // Ajusta esto según la estructura de tus datos
              fila.append($('<td style="'+estiloNuevoEstudiante+' text-align:center;">').text(estadoNuevoEstudiante)); // Ajusta esto según la estructura de tus datos
              fila.append($('<td style="'+estiloAnualidadEstudiante+' text-align:center;">').text(estadoAnualidadEstudiante)); // Ajusta esto según la estructura de tus datos
              fila.append($('<td style="text-align:center; font-weight: bold; background-color:rgb(140, 254, 161);">').text(resultado.MONTHLY_STUDENT)); // Ajusta esto según la estructura de tus datos
              // Añadir una celda con el botón que contiene un enlace
  
              var boton1 = $('<button class="btn btn-primary">').text('Pagar Aporte');
              boton1.click(function() {
                  var url = 'pago_aporte/' + resultado.ID_STUDENT;
              window.open(url, '_blank');
              });
  
              var celdaAcciones = $('<td style="text-align:center;">').append(boton1);
              fila.append(celdaAcciones);
  
              cuerpoTabla.append(fila);
          });
  
  
      }
      // Función para convertir los valores 1, 2, 3 en texto
      function convertirEstado(valor) {
          switch(valor) {
              case '0':
                  return "No corresponde";
              case '1':
                  return "Pendiente";
              case '2':
                  return "Cancelado";
              default:
                  return "Desconocido";  // Por si acaso hay otros valores
          }
      }

      function convertirEstilo(valor) {
          switch(valor) {
              case '0':
                  return "background-color:rgb(167, 167, 167); font-weight: bold;";
              case '1':
                  return "background-color:rgb(238, 130, 118); font-weight: bold;";
              case '2':
                  return "background-color:rgb(109, 255, 167); font-weight: bold;";
              default:
                  return "Desconocido";  // Por si acaso hay otros valores
          }
      }
      function hacerAlgo1(id, url) {
          window.location.href = url;
      }
  });
</script>

</body>
</html>
