<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8' />
  <title>Calendario de Eventos</title>

  <!-- FullCalendar -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
  <!-- Scripts CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/datatables.min.css">
  <link rel="stylesheet" href="css/bootstrap-clockpicker.css">
  <!-- Script JS -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/datatables.min.js"></script>
  <script src="js/bootstrap-clockpicker.js"></script>
  <script src="js/moment-with-locales.js"></script>
  <!-- FullCalendar JS -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

  <!-- Renderizar el calendario -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      // Crear un objeto de tipo Calendar de la libreria FullCalendar
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'datosEvento.php?accion=listar',
        //Evento de hacer click en el calendario
        dateClick: function(info) {
          alert(info.dateStr);
          $("#FormularioEventos").modal('show');
        }
      });
      calendar.render();
    });
  </script>
</head>

<body>
  <!-- Aqui irá el calendario -->
  <div id='calendar' style="border:1px solid #000000;padding:2px"></div>

  <!-- Formulario de Eventos -->
  <div class="modal fade" id="FormularioEventos" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idEvento">

          <div class="form-row"> 
            <div class="form-group col-12">
              <label for="">Titulo del Evento:</label>
              <input type="text" id="Titulo" class="form-control" placeholder="Titulo del evento">
            </div>
          </div>






          <div class="form-row d-flex">
            <div class="form-group col-md-6">
              <label for="">Fecha de inicio:</label>
              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaInicio" class="form-control" value="">
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraInicio">
              <label for="">Hora de inicio:</label>
              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraInicio" class="form-control" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="form-row d-flex ">
            <div class="form-group col-md-6">
              <label for="">Fecha de fin:</label>
              <div class="input-group" data-autoclose="true">
                <input type="date" id="FechaFin" class="form-control" value="">
              </div>
            </div>
            <div class="form-group col-md-6" id="TituloHoraFin">
              <label for="">Hora de fin:</label>
              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" id="HoraFin" class="form-control" autocomplete="off">
              </div>
            </div>
          </div>

          <div class="form-row d-flex m-2 ">
              <label for="">Descripcion</label>
              <textarea id="Descripcion"class="form-control" rows="3"></textarea>
          </div>
          <div class="form-row d-flex m-2">
              <label for="">Color de fondo:</label>
              <input id="color" name="" value="#3788d8" id="ColorFondo" class="form-control" style="height:36px;">
          </div>
          <div class="form-row d-flex ">
              <label for="">Color del texto:</label>
              <input id="color" name="" value="#3788d8" id="ColorTexto" class="form-control" style="height:36px;">
          </div>




        </div>

        <div class="modal-footer">
          <button type="button" id="botonAgregar" class="btn btn-success">Agregar</button>
          <button type="button" id="botonModificar" class="btn btn-success">Modificar</button>
          <button type="button" id="botonBorrar" class="btn btn-success">Borrar</button>
          <button type="button" id="botonCancelar" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>

        </div>

      </div>
    </div>
  </div>

</body>

</html>