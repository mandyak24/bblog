<?php
header('Content-Type: application/json');

// Devuelve la conexion con la BD
require("config/Database.php");
$database = new Database();
$conn = $database->getConnection();

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

switch ($accion) {
    case 'listar':
        $sql = "SELECT idEvento AS id, titulo AS title, descripcion AS description, inicio AS start, fin AS end, colorTexto AS textColor, colorFondo AS backgroundColor FROM evento";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($events);
        break;

    case 'agregar':
        $sql = 'INSERT INTO evento (titulo, descripcion, inicio, fin, colorTexto, colorFondo) VALUES (:titulo, :descripcion, :inicio, :fin, :colorTexto, :colorFondo)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $_POST['titulo']);
        $stmt->bindParam(':descripcion', $_POST['descripcion']);
        $stmt->bindParam(':inicio', $_POST['inicio']);
        $stmt->bindParam(':fin', $_POST['fin']);
        $stmt->bindParam(':colorTexto', $_POST['colorTexto']);
        $stmt->bindParam(':colorFondo', $_POST['colorFondo']);
        if ($stmt->execute()) {
            echo json_encode(array('message' => 'Event added successfully.'));
        } else {
            echo json_encode(array('message' => 'Error adding event.'));
        }
        break;

    case 'modificar':
        $sql = 'UPDATE evento SET titulo = :titulo, descripcion = :descripcion, inicio = :inicio, fin = :fin, colorTexto = :colorTexto, colorFondo = :colorFondo WHERE idEvento = :idEvento';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $_POST['titulo']);
        $stmt->bindParam(':descripcion', $_POST['descripcion']);
        $stmt->bindParam(':inicio', $_POST['inicio']);
        $stmt->bindParam(':fin', $_POST['fin']);
        $stmt->bindParam(':colorTexto', $_POST['colorTexto']);
        $stmt->bindParam(':colorFondo', $_POST['colorFondo']);
        $stmt->bindParam(':idEvento', $_POST['idEvento']);
        if ($stmt->execute()) {
            echo json_encode(array('message' => 'Event updated successfully.'));
        } else {
            echo json_encode(array('message' => 'Error updating event.'));
        }
        break;

    case 'borrar':
        $sql = 'DELETE FROM evento WHERE idEvento = :idEvento';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEvento', $_POST['idEvento']);
        if ($stmt->execute()) {
            echo json_encode(array('message' => 'Event deleted successfully.'));
        } else {
            echo json_encode(array('message' => 'Error deleting event.'));
        }
        break;
}
?>
