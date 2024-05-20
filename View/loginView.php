<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBlog Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        .login-box {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 20px;
        }
        .letrero {
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="nav m-4">
        <img src="img/logo.png" style="width:280px;height:120px">
    </div>
    <div class="container letrero">
        <div class="row justify-content-center align-items-center" style="min-height:500px;">
            <div class="col-md-6">
                <p>Facilitamos el seguimiento diario de las actividades, hitos y cuidados de tus bebés, brindándote tranquilidad y participación activa en su desarrollo.</p>
                <div class="d-flex justify-content-center">
                    <img src="img/imagen1.png" class="img-fluid mx-1 w-50 h-50">
                    <img src="img/imagen2.png" class="img-fluid mx-1 w-50 h-50">
                    <img src="img/imagen3.png" class="img-fluid mx-1 w-50 h-50">
                </div>
                <p>¡Ingresa para empezar a crear recuerdos preciosos y mantener un vínculo cercano con las experiencias diarias de tus pequeños en su guardería!</p>
            </div>
            <div class="col-md-5">
                <div class="login-box" style="background-color:#A0E7E4;">
                    <form method="POST" action="index.php?url=login">

                        <h3 class="text-center text-white">Login</h3>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name="nombreUsuario" placeholder="Nombre de usuario" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name="idAcceso" placeholder="ID de la Guarderia" required>
                        </div>
                        <button class="btn btn-block btn-lg text-white" style="background-color:#44A3B6;" type="submit" name="login">Iniciar sesión</button>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">¿Olvidaste la contraseña?</a>
                        </div>
                        <hr>
                    </form>
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
