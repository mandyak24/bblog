<?php
require_once 'Model/UserModel.php';

class LoginController
{

    public function mostrarlogin()
    {
        require_once 'View/loginView.php';
    }

    public function login()
    {


        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreUsuario = $_POST['nombreUsuario'];
            $password = $_POST['password'];
            $idAcceso = $_POST['idAcceso'];
            $userModel = new UserModel();

            var_dump($nombreUsuario);
            var_dump($password);
            var_dump($idAcceso);
            $usuario = $userModel->login($nombreUsuario, $password, $idAcceso);

            if ($usuario) {
                // Usuario encontrado, iniciar sesión
                session_start();
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['tipoUsuario'] = $usuario['tipoUsuario'];
                $_SESSION['idGuarderia'] = $usuario['idGuarderia'];
                $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];


                if ($usuario['tipoUsuario'] == "maestro") {
                    header("Location:index.php?url=dashboardM");
                    exit();
                } else {
                    var_dump($_SESSION['idUsuario']);
                    header("Location:index.php?url=dashboardP");
                    exit();
                }
            }
        } else {
            $error = "Usuario o contraseña incorrectos";
        }
        require_once 'View/loginView.php';
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?url=login");
        exit();
    }
}
