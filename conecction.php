<?php
// Conexión a la base de datos (valores por defecto)
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

// Recibir y limpiar los datos del formulario
$referencia = mysqli_real_escape_string($conn, $_POST['referencia']);
$descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
$cantidad = (int)$_POST['cantidad'];
$numero_caja = (int)$_POST['numero_caja'];

// Preparar SQL para insertar los datos, incluyendo la fecha y hora
$sql = "INSERT INTO tiendaempaques (referencias, des_Item, cantidad, `num-caja`, fecha_registro)
        VALUES ('$referencia', '$descripcion', $cantidad, $numero_caja, CURRENT_TIMESTAMP)";

// Ejecutar la consulta 
if ($conn->query($sql) === TRUE) {
    echo "Datos ingresados correctamente Por Usuario BOY TOYS.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Cerrar conexión
$conn->close();
?>
