<?php
// Conectarse a la base de datos desde PHP
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

// Preparar SQL para leer los datos
$sql = "SELECT referencias, des_Item, cantidad, `num-caja`, fecha_registro FROM tiendaempaques";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Referencia</th>
                <th>Descripción del ítem</th>
                <th>Cantidad</th>
                <th>Número de caja</th>
                <th>Fecha de registro</th>
            </tr>";
    // Salida de cada fila de los resultados

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['referencias']}</td>
                <td>{$row['des_Item']}</td>
                <td>{$row['cantidad']}</td>
                <td>{$row['num-caja']}</td>
                <td>{$row['fecha_registro']}</td>
              </tr>";
    }
    echo "</table>";
}else{
        "No hay datos registrados.";

    }

    // Cerrara la conexion 

    $conn->close();

    ?>


    
 
    





