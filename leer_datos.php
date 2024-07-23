<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_LeerDatos.css">
    <link rel="icon" href="LOGO-BOY-TOYS.png" type="image/png">
    <title>Leer Datos</title>
</head>
<body>
    <div class="main">
        <div class="header">
            <img src="LOGO-BOY-TOYS.png" alt="Boytoys" />
        </div>
        <h1>Datos Registrados</h1>

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

        // Establecer el número de resultados por página
        $results_per_page = 8;

        // Verificar el número de página actual
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        // Calcular el índice inicial de los resultados para la consulta SQL
        $start_from = ($page - 1) * $results_per_page;

        // Preparar SQL para leer los datos con límite de paginación y ordenados por fecha en orden descendente
        $sql = "SELECT id, referencias, des_Item, cantidad, `num-caja`, fecha_registro FROM tiendaempaques ORDER BY fecha_registro DESC LIMIT $start_from, $results_per_page";
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Referencia</th>
                        <th>Descripción del ítem</th>
                        <th>Cantidad</th>
                        <th>Número de caja</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>
                    </tr>";
            // Salida de cada fila de los resultados
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['referencias']}</td>
                        <td>{$row['des_Item']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['num-caja']}</td>
                        <td>{$row['fecha_registro']}</td>
                        <td><a href='editar_datos.php?id={$row['id']}'><img  style='width: 20px; height: 20px;' src='edit_icon.png' alt='Editar' title='Editar'>editar</a></td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos registrados.";
        }

        // Calcular el número total de páginas
        $sql = "SELECT COUNT(*) AS total FROM tiendaempaques";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_pages = ceil($row["total"] / $results_per_page);

        // Generar enlaces de paginación
        echo '<div class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='leer_datos.php?page=" . $i . "'";
            if ($i == $page) echo " class='active'";
            echo ">" . $i . "</a> ";
        }
        echo '</div>';

        // Cerrar la conexión
        $conn->close();
        ?>

        <div class="button-container">
            <button onclick="navigateTo('ingreso_datos.html')">Regresar</button>
        </div>
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
