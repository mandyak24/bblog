
<?php
class Database{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "bblog2";


    public function getConnection(){
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
           throw $e;
        }
    }
}

?>