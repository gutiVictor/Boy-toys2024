<?php
// Conectarse a la base de datos desde PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empaques"; // Nombre base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener y limpiar los parámetros de fechas
$fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';

// Construir la consulta SQL con filtros de fecha
$conditions = [];
if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    $conditions[] = "fecha_registro BETWEEN '$fecha_inicio' AND '$fecha_fin'";
}
$whereClause = '';
if (count($conditions) > 0) {
    $whereClause = 'WHERE ' . implode(' AND ', $conditions);
}

$sql = "SELECT id, codigo_barras, des_Item, cantidad, `num-caja`, Ref, fecha_registro 
        FROM tiendaempaques 
        $whereClause
        ORDER BY fecha_registro DESC";

$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Código/Barras</th>
                    <th>Ref</th>
                    <th>Descripción del ítem</th>
                    <th>Cantidad</th>
                    <th>Número de caja</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>";
    // Salida de cada fila de los resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['codigo_barras']}</td>
                <td>{$row['Ref']}</td>
                <td>{$row['des_Item']}</td>
                <td>{$row['cantidad']}</td>
                <td>{$row['num-caja']}</td>
                <td>{$row['fecha_registro']}</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "No hay datos registrados en el rango de fechas especificado.";
}

// Cerrar la conexión
$conn->close();
?>
