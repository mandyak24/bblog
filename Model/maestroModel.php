<?php
// Clase para los maestros de la guarderia (isAdmin = true)

class MaestroModel extends UserModel
{
    private $idMaestro; // Id del maestro en la tabla users
    private $nombreUsuario;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono;
    private $idGuarderia;
    private $foto;
    private $conn;

    public function __construct(){

        parent::__construct();
        $db=new Database();
        $this->conn=$db->getConnection();

    }

    public function __get($nombre)
    {
        if (property_exists($this, $nombre)) {
            return $this->$nombre;
        }
        return null;
    }

    public function __set($nombre, $valor)
    {
        if (property_exists($this, $nombre)) {
            $this->$nombre = $valor;
        }
    }

    //Get del idGuarderia
    public function getIdGuarderia(){
        return $this->idGuarderia;
    }
    //Get nombreUsuario
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }

    // public function mostrarUsuario($idUsuario)
    // {
    //     $query = "SELECT * FROM usuario u JOIN maestro m ON u.idUsuario = m.idMaestro WHERE u.idUsuario = :idUsuario";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':idUsuario', $idUsuario);
    //     $stmt->execute();
    //     $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    //     return $usuario;
    // }

    //¿Que hace el ADMIN?

    //Mostrar todos los usuarios de la guarderia

    public function mostrarUsuarios($idGuarderia){
        $query = "SELECT * FROM usuario WHERE idGuarderia = :idGuarderia";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idGuarderia', $idGuarderia);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;
    }


    //1.INTRODUCE NUEVO USUARIO PADRE
    public function introducirNuevoUsuario($idGuarderia, $isAdmin){
        
        //Generar el hash de la contraseña para introducirla a la BD hashed.
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        // Obtener el idGuarderia del maestro
        $idGuarderia = $this->idGuarderia;
        // $isAdmin=0;
    
        //Insertar usuario isAdmin=1 (maestro/administrador)
        $query = "INSERT INTO usuario (nombreUsuario, nombre, apellidos, password, email, telefono, isAdmin, idGuarderia, foto) 
                  VALUES (:nombreUsuario, :nombre, :apellidos, :password, :email, :telefono, :isAdmin, :idGuarderia, :foto)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombreUsuario', $this->nombreUsuario);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':isAdmin', $isAdmin);
        $stmt->bindParam(':idGuarderia', $idGuarderia);
        $stmt->bindParam(':foto', $this->foto);
        $stmt->execute();
    }
    //2.ELIMINAR UN USUARIO EXISTENTE
    public function eliminarUsuario($idUsuario){
        $query = "DELETE FROM usuario WHERE idUsuario = :idUsuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
    }

    //3.ACTUALIZAR USUARIO EXISTENTE
    public function actualizarUsuario($idUsuario, $nombreUsuario, $nombre, $apellidos, $password, $email, $telefono, $idGuarderia, $foto){
        $query = "UPDATE usuario SET nombreUsuario = :nombreUsuario, nombre = :nombre, apellidos = :apellidos, password = :password, email = :email, telefono = :telefono, idGuarderia = :idGuarderia, foto = :foto WHERE idUsuario = :idUsuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':idGuarderia', $idGuarderia);
        $stmt->bindParam(':foto', $foto);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
    }

}
