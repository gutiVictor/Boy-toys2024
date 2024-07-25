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
        <form method="GET">
            <input type="text" name="codigo" placeholder="Ingrese El Código de Barras">
            <input type="text" name="num_caja" placeholder="Ingrese El Número de Caja">
            <input type="text" name="ref" placeholder="Ingrese Ref"> <!-- Nuevo campo para Ref -->
            <button type="submit">Buscar</button>
        </form>

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

        // Obtener el parámetro de paginación
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
        $num_caja = isset($_GET['num_caja']) ? $_GET['num_caja'] : '';
        $ref = isset($_GET['ref']) ? $_GET['ref'] : ''; // Obtener el parámetro ref

        // Construir la consulta SQL con filtros y límites
        $conditions = [];
        if (!empty($codigo)) {
            $conditions[] = "codigo_barras LIKE '%$codigo%'";
        }
        if (!empty($num_caja)) {
            $conditions[] = "`num-caja` LIKE '%$num_caja%'";
        }
        if (!empty($ref)) {
            $conditions[] = "ref LIKE '%$ref%'"; // Agregado para Ref
        }
        $whereClause = '';
        if (count($conditions) > 0) {
            $whereClause = 'WHERE ' . implode(' AND ', $conditions);
        }

        $sql = "SELECT id, codigo_barras, des_Item, cantidad, `num-caja`, ref, fecha_registro 
                FROM tiendaempaques 
                $whereClause
                ORDER BY fecha_registro DESC LIMIT $limit OFFSET $offset";

        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            echo "<table id='dataTable'>
                    <thead>
                        <tr>
                            <th>Código/Barras</th>
                            <th>Descripción del ítem</th>
                            <th>Cantidad</th>
                            <th>Número de caja</th>
                            <th>Ref</th> <!-- Agregado Ref -->
                            <th>Fecha de registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";
            // Salida de cada fila de los resultados
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['codigo_barras']}</td>
                        <td>{$row['des_Item']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['num-caja']}</td>
                        <td>{$row['ref']}</td> <!-- Agregado Ref -->
                        <td>{$row['fecha_registro']}</td>
                        <td><a href='editar_datos.php?id={$row['id']}'><img style='width: 20px; height: 20px;' src='edit_icon.png' alt='Editar' title='Editar'>editar</a></td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No hay datos registrados.";
        }

        // Obtener el número total de registros para paginación
        $sqlCount = "SELECT COUNT(*) as total FROM tiendaempaques $whereClause";
        $resultCount = $conn->query($sqlCount);
        $totalRows = $resultCount->fetch_assoc()['total'];
        $totalPages = ceil($totalRows / $limit);

        // Cerrar la conexión
        $conn->close();
        ?>

        <!-- Paginación -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>&codigo=<?php echo $codigo; ?>&num_caja=<?php echo $num_caja; ?>&ref=<?php echo $ref; ?>">&laquo; Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&codigo=<?php echo $codigo; ?>&num_caja=<?php echo $num_caja; ?>&ref=<?php echo $ref; ?>"<?php if ($i == $page) echo ' class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>&codigo=<?php echo $codigo; ?>&num_caja=<?php echo $num_caja; ?>&ref=<?php echo $ref; ?>">Siguiente &raquo;</a>
            <?php endif; ?>
        </div>

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
