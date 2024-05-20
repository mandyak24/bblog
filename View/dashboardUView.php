<?php
session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    // El usuario no ha iniciado sesión, redirigirlo al inicio de sesión
    header("Location: loginView.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .bar {
            width: 30px;
            height: 3px;
            background-color: black;
            margin: 6px 0;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" class="w-50 h-50 img-fluid" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="burgerMenu">
                <span class="navbar-toggler-icon">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../View/miperfilView.php">Mi perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Calendario de eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Resumen diario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Articulos de interés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <form method="POST" action="../Controller/loginController.php">
                        <button type="submit" name="logout">Cerrar Sesion</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <section class="w-100 mt-5">
        <img src="https://via.placeholder.com/150" class="img-fluid" alt="Foto de portada">
        <a href="">Saber mas</a>
    </section>

    <h1 class="text-center">Dashboard de <?php echo $usuario['nombreUsuario'] ?></h1>


    <section class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="https://via.placeholder.com/150" alt="Foto de perfil">
                <h2 class="mt-3">Perfil</h2>
                <p>Nombre: <?= $usuario['nombreUsuario'] ?></p>
                <p>Correo: <?= $usuario['correo'] ?></p>
                <p>Telefono: <?= $usuario['telefono'] ?></p>
                <a href="https://via.placeholder.com/150" class="btn btn-primary mt-3">Editar perfil</a>
            </div>
            <div class="col-md-6">
                <h2 class="mt-3">Calendario de eventos</h2>
                <ul>
                    <li>Evento 1</li>
                    <li>Evento 2</li>
                    <li>Evento 3</li>
                </ul>
                <a href="https://via.placeholder.com/150" class="btn btn-primary mt-3">Ver todos los eventos</a>
            </div>
        </div>
    </section>

    <!-- Add Bootstrap JS -->
    <script>
        const burgerMenu = document.getElementById('burgerMenu');

        burgerMenu.addEventListener('click', () => {
            const navbarCollapse = document.getElementById('navbarNav');
            navbarCollapse.classList.toggle('show');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7RduPuemT//+jJXB16zg6i8UQD3lV5uDC3Yc7bz1Eeow" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>