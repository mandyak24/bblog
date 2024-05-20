<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Bebé</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos adicionales */
        .editable-field {
            border: none;
            background-color: transparent;
            cursor: pointer;
        }
        .editable-field:focus {
            outline: none;
            border-bottom: 1px solid #007bff; /* Color azul de Bootstrap */
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 id="nombreBebe" class="mb-0"><?php echo $_POST['nombre'];?></h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img id="imagenBebe" src="" class="img-fluid" alt="Imagen del bebé">
                            </div>
                            <div class="col-md-6">
                                <p>Nombre: <span id="nombreField" class="editable-field" contenteditable="true"><?php echo $_POST['nombre'];?></span></p>
                                <p>Edad: <span id="edadField" class="editable-field" contenteditable="true"><?php echo $edad;?></span></p>

                                <p>Grupo: <span id="grupoField" class="editable-field" contenteditable="true"><?php echo $bebe['idGrupo']?></span></p>
                                <p>Fecha de Ingreso: <span id="fechaIngresoField" class="editable-field" contenteditable="true">01/01/2023</span></p>
                                <p>Fecha de Nacimiento: <span id="fechaNacimientoField" class="editable-field" contenteditable="true"><?php echo $bebe['fechaNacimiento']?>;</span></p>
                                <p>Padre: <span id="padreField" class="editable-field" contenteditable="true"><?php echo $bebe['idPadre']?>;</span></p>
                                <p>Madre: <span id="madreField" class="editable-field" contenteditable="true"><?php echo $padre['nombre']?>;</span></p>
                                <p>Teléfono de Emergencia: <span id="telefonoField" class="editable-field" contenteditable="true">123-456-7890</span></p>
                                <p>Observaciones: <span id="observacionesField" class="editable-field" contenteditable="true">Sin observaciones</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery (Required for Bootstrap JS) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Script para guardar los cambios al editar los campos
        $(document).ready(function() {
            $('.editable-field').blur(function() {
                var fieldId = $(this).attr('id');
                var newValue = $(this).text();
                // Aquí puedes enviar el newValue al servidor para guardar los cambios
                console.log("Campo " + fieldId + " editado. Nuevo valor: " + newValue);
            });
        });
    </script>
</body>
</html>
