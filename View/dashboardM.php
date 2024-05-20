<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Panel</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Estilos adicionales para ajustar el tamaño de los botones */
        .config-btn {
            width: 100%;
            height: 100px;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* CSS para cambiar el color de fondo al hacer hover en los enlaces del dropdown menu */
        .dropdown-item:hover {
            background-color: #F67D92;
            /* Cambia el color de fondo al hacer hover */
            color: white;
            /* Cambia el color del texto para mejorar la legibilidad */
        }
    </style>
</head>

<body>
    <nav style="position: sticky; top: 0; width: 100%;" class="navbar navbar-expand-lg navbar-white bg-white fixed-top border-bottom">
        <!-- Menu hamburguesa -->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" style="color:#F67D92;">
                <i class="fa fa-bars" style="font-size:36px"></i>
            </a>
            <div class="dropdown-menu border" aria-labelledby="navbarDropdownMenuLink" style="margin-top:15px; padding:10px;">
                <a class="dropdown-item mt-3" href="insertarUsuario.php">Administración de Grupos</a>
                <a class="dropdown-item mt-3" href="#">Administración de Infantes</a>
                <a class="dropdown-item mt-3" href="#">Mensaje del dia</a>
                <a class="dropdown-item mt-3" href="#">Control de Stock</a>
                <a class="dropdown-item mt-3" href="#">Control de Eventos</a>
                <a class="dropdown-item mt-3" href="#">Control de Padres</a>
            </div>
        </div>
        <!-- Logo -->
        <a class="navbar-brand mr-auto" href="#"><img src="img/logo.png" class="img-fluid" style="width: 180px; height: auto; "></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link ml-2" href="#"><i class="fa fa-gear" style="font-size:36px ;color:#44A3B6;"></i></a>
                </li>

                <li class="nav-item d-flex align-items-center position-relative">
                    <a class="nav-link ml-2" href="#" onclick="toggleMenu()"><i class="fa fa-user-circle" style="font-size:36px;color:#44A3B6;"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" id="menu" style="display:none; ">
                        <form action="index.php?url=logout" method="POST">
                            <a href="miperfilView.php" name="perfil" class="dropdown-item">Perfil</a>
                            <a href="./index.php?logout" name="logout" class="dropdown-item">Cerrar sesión</a>
                        </form>
                    </div>

                </li>
            </ul>
        </div>
    </nav>
    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            if (menu.style.display === "none" || menu.style.display === "") {
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        }
    </script>




    <!-- Mensaje de bienvenida-->
    <div class="container">
        <h4 style="font-size:18px;">
            <?php echo $welcomeMessage . '' . $_SESSION['nombreUsuario'] ?>
        </h4>
    </div>
    <!-- Informacion de la guarderia -->
    <div class="container m-0" id="perfilGuarderia" style="position: sticky; width: 100%;">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h4 class="text-center">Mi Guardería</h4>
                    <div class="card-body text-center">
                        <img src="img/guarderia.jpg" class="img-fluid mx-auto d-block" style="width: 250px; height: auto;">
                        <p class="card-text">Nombre: <?php echo $guarderia->nombreGuarderia; ?></p>
                        <p class="card-text">Direccion: <?php echo $guarderia->direccion; ?></p>
                        <p class="card-text">Teléfono: <?php echo $guarderia->telefono; ?></p>
                        <p>Website:<a class="card-text"> <?php echo $guarderia->website; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Informacion de grupos -->
    <div class="container m-1">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center">Tu grupo</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action"><?php echo $grupo['nombreGrupo']; ?></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Informacion de alumnos -->
    <div class="container m-1">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center">Tus alumnos</h4>
                <div class="list-group">
                    <?php foreach ($bebes as $bebe) : ?>
                        <form method="POST" action="index.php?url=perfilBebe">
                            <input type="hidden" name="idBebe" value="<?php echo $bebe['idBebe']; ?>">
                            <input type="hidden" name="idGrupo" value="<?php echo $bebe['idGrupo']; ?>">
                            <input type="hidden" name="nombre" value="<?php echo $bebe['nombre']; ?>">
                        <p><?php echo $bebe['nombre']; ?></p>
                        <button type="submit" name="perfilBebe" class="btn btn-primary">Ir al perfil</button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center">Menú de Configuración</h2>
    <div class="container">
        <div class="row mt-5">

            <!-- Columna 1 -->
            <div class="col-md-4">

                <div class="list-group mt-3">
                <form action="index.php?url=crudBebe" method="POST">
                    <!-- Opción 1 -->
                    <button type="button" onclick="window.location.href='../View/insertarUsuario.php'" name="insertarUsuario" class="list-group-item list-group-item-action config-btn">Configuracion de mis usuarios</button>
                    <!-- Opción 2 -->
                    <button type="submit" class="list-group-item list-group-item-action config-btn" name="crudBebe">Modificar datos de alumno</button>
                    <!-- Opción 3 -->
                   
                        <button type="submit" name="crearEvento" class="list-group-item list-group-item-action config-btn">Crear un evento</button>
                    </form>

                    <!-- Opcion 4 -->
                    <button type="button" class="list-group-item list-group-item-action config-btn">Añadir, eliminar curso</button>
                </div>
            </div>
            <!-- Columna 2 -->
            <div class="col-md-6">
                <div class="list-group mt-3">
                    <!-- Opción 5 -->
                    <button type="button" class="list-group-item list-group-item-action config-btn">Actualizar resumen diario</button>
                    <!-- Opción 6 -->
                    <button type="button" class="list-group-item list-group-item-action config-btn">Crear, eliminar grupo</button>
                    <!-- Opción 7 -->
                    <button type="button" class="list-group-item list-group-item-action config-btn">Subir fotos a BBlog insta</button>
                    <!-- Opcion 8 -->
                    <button type="button" class="list-group-item list-group-item-action config-btn">Control de stock</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlace a Bootstrap JS (opcional, si necesitas funcionalidades de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<!-- Informacion de la cuenta 
        -Foto de perfil
        -Nombre y apellidos 
        -Especializacion 
        -Email
        -Telefono de contacto
        -Grupos en los que imparte 
        -Eventos programados
    -->


</html>