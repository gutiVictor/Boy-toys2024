<?php

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empaques";

$conn = new mysqli($servername,$username,$password,$dbname);

//Verificacion de Conexion


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar los datos
$sql = "SELECT * FROM tiendaempaques";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Crear un array para almacenar los datos
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "No se encontraron datos.";
    exit;
}
   $conn->close();

   ?>

   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportar a Excel</title>
</head>
   <body>
       <form action="export_excel.php" method="post">
        <button type ="submit" name=" export">Exportar a Excel</button>
       </form>
   </body>

   </html>






