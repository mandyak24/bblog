<?php
//Insertar un nuevo usuario 
session_start();
?>
<h3>Mostrar Usuarios</h3>
<form method="POST" action="../Controller/dashboardController.php">
    <button type="submit" name="mostrarUsuarios">Mostrar usuarios</button>
</form>

<br>
<!-- Mostrar los usuarios aqui: -->
<?php
if (isset($_SESSION['usuarios'])) {
    $usuarios = $_SESSION['usuarios'];
    foreach ($usuarios as $usuario) {
        echo "ID: " . $usuario['idUsuario'] . "<br>";
        echo "Nombre de usuario: " . $usuario['nombreUsuario'] . "<br>";
        echo "Nombre: " . $usuario['nombre'] . "<br>";
        echo "Apellidos: " . $usuario['apellidos'] . "<br>";
        echo "Email: " . $usuario['email'] . "<br>";
        echo "Teléfono: " . $usuario['telefono'] . "<br>";
        echo "<br>";
    }
} else {
    echo "No hay usuarios";
}
?>




<h3>Insertar nuevo usuario</h3>

<form method="POST" action="../Controller/dashboardController.php">
    <label for="nombreUsuario">Nombre de usuario:</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario">
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos">
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono">
    <br>
    <br>
    <!-- hidden -->
    <input type="hidden" name="idGuarderia" id="idGuarderia" value="<?php  echo $_SESSION['idGuarderia']; ?>">
    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto">
    <br><br>
    <button type="submit" name="insertarUsuario">Insertar usuario</button>
</form>
<br>
<!-- ELIMINAR USUARIO -->
<h3>Eliminar un usuario </h3>
<form method="POST" action="../Controller/dashboardController.php">
    <label for="idUsuario">ID del usuario:</label>
    <input type="text" name="idUsuario" id="idUsuario">
    <br>
    <button type="submit" name="eliminarUsuario">Eliminar usuario</button>
</form>
<br>
<!-- ACTUALIZAR USUARIO -->
<h3>Actualizar un usuario </h3>
<form method="POST" action="../Controller/dashboardController.php">
    <label for="idUsuario">ID del usuario:</label>
    <input type="text" name="idUsuario" id="idUsuario">
    <br>
    <label for="nombreUsuario">Nombre de usuario:</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario">
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos">
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono">
    <br>
    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto">
    <br><br>
    <button type="submit" name="actualizarUsuario">Actualizar usuario</button>
</form>