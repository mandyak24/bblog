<?php
session_start();

require_once 'config/Database.php';
require_once 'Controller/LoginController.php';
require_once 'Controller/DashboardController.php';

// Función de enrutamiento básico
function route($url)
{
    $loginController = new LoginController();
    $dashboardController = new DashboardController();
    switch ($url) {
        case 'mostrarLogin':
            $loginController->mostrarlogin();
            break;
        case 'login':
          $loginController->login();
          break;
        case 'logout':
          $loginController->logout();
          break;
        case 'dashboardM':
            $dashboardController->verVistaMaestro();
            break;
        case 'dashboardP':
            $dashboardController->verVistaPadre();
            break;
        case 'perfilBebe':
            $dashboardController->mostrarPerfilBebe();
            break;
        case 'crudBebe':
            $dashboardController->mostrarCRUDBebe();
            break;
      
       
        default:
            echo "404 - Página no encontrada";
            break;
    }
}

// Obtener la URL solicitada
$url = isset($_GET['url']) ? $_GET['url'] : 'mostrarLogin';

// Enrutar la solicitud
route($url);
