<?php
require_once 'config/Database.php';
class BebeModel
{
    private $idBebe;
    private $idPadre;
    private $idGrupo;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $enfermedades;
    private $alergias;

    private $conn;

    public function __construct()
    {

        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Método mágico __get() para acceder dinámicamente a los atributos
    public function __get($nombre)
    {
        if (property_exists($this, $nombre)) {
            return $this->$nombre;
        }
        return null;
    }

    // Método mágico __set() para establecer dinámicamente los atributos
    public function __set($nombre, $valor)
    {
        if (property_exists($this, $nombre)) {
            $this->$nombre = $valor;
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

    public function mostrarUnBebe($idBebe)
    {
        $query = "SELECT * FROM bebe WHERE idBebe = :idBebe";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idBebe', $idBebe);
        $stmt->execute();
        $bebe = $stmt->fetch(PDO::FETCH_ASSOC);

        return $bebe;
    }

    public function añadirBebe()
    {
        $query = "INSERT INTO bebe (nombre, apellidos, fechaNacimiento, enfermedades, alergias,idGrupo) 
        VALUES (:nombre, :apellidos, :fechaNacimiento, :enfermedades, :alergias,:idGrupo)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':fechaNacimiento', $this->fechaNacimiento);
        $stmt->bindParam(':enfermedades', $this->enfermedades);
        $stmt->bindParam(':alergias', $this->alergias);
        $stmt->bindParam(':idGrupo', $this->idGrupo);
        $stmt->execute();
    }


    public function calcularEdadEnAniosYMeses()
    {
        $fechaNacimiento = new DateTime($this->fechaNacimiento);
        $hoy = new DateTime();
        $edad = $fechaNacimiento->diff($hoy);

        $anios = $edad->y;
        $meses = $edad->m;

        return "$anios años y $meses meses";
    }


        public function bebeypadre()
        {
            $query = "SELECT u.nombre AS nombre_usuario
                      FROM padre_bebe pb
                      INNER JOIN usuario u ON pb.idPadre = u.idUsuario
                      INNER JOIN bebe b ON pb.idBebe = b.idBebe
                      WHERE b.idBebe = :idBebe";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idBebe', $this->idBebe);
            $stmt->execute();
            $padre = $stmt->fetch(PDO::FETCH_ASSOC);

            return $padre;
        }

    }




