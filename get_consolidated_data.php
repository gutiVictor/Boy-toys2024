<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empaques";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT `num-caja` as box, codigo_barras as barcode, Ref as ref, SUM(cantidad) as total
        FROM tiendaempaques
        GROUP BY `num-caja`, codigo_barras, Ref";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = array("message" => "No se encontraron datos");
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
