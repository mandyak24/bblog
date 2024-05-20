<?php
class UserModel
{
    private $idUsuario;
    private $nombreUsuario;
    private $nombre;
    private $apellidos;
    private $password;
    private $email;
    private $telefono;
    private $tipoUsuario;
    private $idGuarderia;
    private $foto;

    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function login($nombreUsuario, $password, $idAcceso)
    {
        $query = "SELECT u.idUsuario, u.nombreUsuario, u.password, g.idAcceso, g.website, g.nombreGuarderia, g.telefono, u.idGuarderia, u.tipoUsuario
                  FROM usuario u
                  INNER JOIN guarderia g ON u.idGuarderia = g.idGuarderia
                  WHERE u.nombreUsuario = :nombreUsuario 
                  AND g.idAcceso = :idAcceso";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario);
        $stmt->bindParam(':idAcceso', $idAcceso);
        $stmt->execute();
        var_dump($stmt->errorInfo());

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        //Arreglar lo de la contraseña
        // password_verify($password, $usuario['password'])
        // Verificar si se encontró un usuario
        if ($usuario ) {
            return $usuario;
        } else {
            return null;
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?url=login");
        exit();
    }



    public function obtenerGrupoDelMaestro(){
       $query = "SELECT g.idGrupo, g.nombreGrupo FROM grupo g
              INNER JOIN usuario u ON g.idMaestro = u.idUsuario
              WHERE u.idUsuario = :idMaestro";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idMaestro', $_SESSION['idUsuario']);
        $stmt->execute();
        $grupo = $stmt->fetch(PDO::FETCH_ASSOC);
        return $grupo;

    }
}
?>
