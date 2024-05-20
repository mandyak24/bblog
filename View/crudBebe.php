<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion de Alumnos</title>
</head>

<body>
    <h3>Inscribir nuevo alumno en el Grupo</h3>
    <form action="" method="POST">
        
       
        <label for="nombre">Nombre del bebe: <input type="text" name="nombre" id="nombre"></label><br>
        <label for="apellidos">Apellidos del bebe:<input type="text" name="apellidos" id="apellidos"></label><br>
        <label for="fechaNacimiento">Fecha de Nacimiento:<input type="date" name="fechaNacimiento" id="fechaNacimiento"></label><br>
        
        <label for="enfermedades">Enfermedades      <input type="text" name="enfermedades" id="enfermedades"> </label><br>
   
        <label for="alergias">Alergias         <input type="text" name="alergias" id="alergias">
</label><br>

        <input type="hidden" name="idGrupo" value="<?php echo $idGrupo; ?>">

        <input type="submit" name="insertarBebe" value="Insertar">
    </form>

    <hr>    

    <h3>Eliminar alumno</h3>
    <form action="" method="POST">
        <label for="idBebe">ID del bebe:</label>
        <input type="text" name="idBebe" id="idBebe"><br>
        <input type="submit" name="eliminarBebe" value="Eliminar">
    </form>

</body>

</html>