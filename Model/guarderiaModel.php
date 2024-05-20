<?php
class GuarderiaModel
{

    private $nombreGuarderia;
    private $direccion;
    private $telefono;
    private $idAcceso;
    private $website;

    private $conn;


    public function __construct()
    {

        $db = new Database();
        $this->conn = $db->getConnection();
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

    public function obtenerGuarderia($idGuarderia)
    {
        $query = "SELECT * FROM guarderia WHERE idGuarderia = :idGuarderia";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':idGuarderia', $idGuarderia);
        $stmt->execute();
        $guarderia = $stmt->fetch(PDO::FETCH_ASSOC);

        //Crear objeto Guarderia
        $guarderiaObjeto = new stdClass();

        $guarderiaObjeto->nombreGuarderia = $guarderia['nombreGuarderia'];
        $guarderiaObjeto->direccion = $guarderia['direccion'];
        $guarderiaObjeto->telefono = $guarderia['telefono'];
        $guarderiaObjeto->idAcceso = $guarderia['idAcceso'];
        $guarderiaObjeto->website = $guarderia['website'];
    
        return $guarderiaObjeto;
    }

    
}
