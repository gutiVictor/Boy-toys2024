<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $numero_caja = $_POST['numero_caja'];

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

    // Preparar SQL para actualizar los datos
    $sql = "UPDATE tiendaempaques SET codigo_barras = '$codigo', des_Item = '$descripcion', cantidad = $cantidad, `num-caja` = $numero_caja WHERE id = $id";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        header("Location: leer_datos.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }

    // Cerrar la aplicación
    $conn->close();
}
?>
       
