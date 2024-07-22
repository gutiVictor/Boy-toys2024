<?php
if (isset($_POST["export"])) {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "empaques"; // Nombre de la base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consultar los datos
    $sql = "SELECT * FROM tiendaempaques";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data.xls"');
        header('Cache-Control: max-age=0');

        // Escribir los datos en el archivo Excel
        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Referencia', 'Descripción', 'Cantidad', 'Número de Caja', 'Fecha Registro'));

        while($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }

        fclose($output);
    } else {
        echo "No se encontraron datos.";
    }

    $conn->close();
}
?>
