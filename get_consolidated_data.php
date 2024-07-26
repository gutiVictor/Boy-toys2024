<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empaques";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener parámetros de filtro
$box = isset($_GET['box']) ? $_GET['box'] : '';
$barcode = isset($_GET['barcode']) ? $_GET['barcode'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';

// Construir la consulta SQL con filtros
$sql = "SELECT `num-caja` AS box, codigo_barras AS barcode, Ref AS ref, SUM(cantidad) AS total FROM tiendaempaques WHERE 1=1";

if (!empty($box)) {
    $sql .= " AND `num-caja` LIKE '%" . $conn->real_escape_string($box) . "%'";
}
if (!empty($barcode)) {
    $sql .= " AND codigo_barras LIKE '%" . $conn->real_escape_string($barcode) . "%'";
}
if (!empty($date)) {
    $sql .= " AND DATE(fecha) = '" . $conn->real_escape_string($date) . "'";
}

$sql .= " GROUP BY `num-caja`, codigo_barras, Ref";

$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data['message'] = "No se encontraron datos.";
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
