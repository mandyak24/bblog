<?php
require_once 'Model/guarderiaModel.php';
require_once 'Model/bebeModel.php';
require_once 'Model/userModel.php';


class DashboardController
{
    private $conn;
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // La vista de ADMINISTRADOR
    public function verVistaMaestro()
    {
        if (!isset($_SESSION['idUsuario'])) {
            header("Location: index.php?url=login");
            exit();
        }
        $idGuarderia = $_SESSION['idGuarderia'];
        $guarderiaModel = new GuarderiaModel();
        $guarderia = $guarderiaModel->obtenerGuarderia($idGuarderia);
        $welcomeMessage = $this->mensajeBienvenida();

        $userModel=new UserModel();
        $grupo=$userModel->obtenerGrupoDelMaestro();

        $bebeModel=new BebeModel();
        $bebes=$bebeModel->mostrarTodosLosBebesDeUnGrupo($grupo['idGrupo']);



        require_once 'View/dashboardM.php';
    }


    // La vista de PADRE
    public function verVistaPadre()
    {
        if (!isset($_SESSION['idUsuario'])) {
            header("Location: index.php?url=login");
            exit();
        }
        require_once 'View/dashboardP.php';
    }

    public function mensajeBienvenida()
    {
        $hour = date('H');

        if ($hour >= 6 && $hour < 12) {
            echo "Buenos días";
        } elseif ($hour >= 12 && $hour < 18) {
            echo "Buenas tardes";
        } else {
            echo "Buenas noches";
        }
    }

    public function mostrarTodosLosBebesDeUnGrupo($idGrupo)
    {
        $query = "SELECT * FROM bebe WHERE idGrupo = :idGrupo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idGrupo', $idGrupo);
        $stmt->execute();
        $bebes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $bebes;
    }


    public function mostrarPerfilBebe(){
        $bebeModel=new BebeModel();
        $bebe=$bebeModel->mostrarUnBebe($_POST['idBebe']);
        $padre=$bebeModel->bebeypadre();






        require_once 'View/perfilBebe.php';
    
    }



    public function mostrarCRUDBebe(){
        require_once 'View/crudBebe.php';
    }

}

























//Insertar usuario
if (isset($_POST['insertarUsuario'])) {
    $maestroModel = new MaestroModel();
    $maestroModel->introducirNuevoUsuario($_POST['idGuarderia'],$_POST['isAdmin']);
    
}

//Eliminar usuario existente

if (isset($_POST['eliminarUsuario'])) {
    $maestroModel=new MaestroModel();
    $maestroModel->eliminarUsuario($_POST['idUsuario']);
}

//Actualizar usuario existente
if(isset($_POST["actualizarUsuario"])){
    $maestroModel=new MaestroModel();
    $maestroModel->actualizarUsuario($_POST['idUsuario'],$_POST['nombreUsuario'],$_POST['nombre'],$_POST['apellidos'],$_POST['password'],$_POST['email'],$_POST['telefono'],$_POST['idGuarderia'],$_POST['foto']);
}

?>
