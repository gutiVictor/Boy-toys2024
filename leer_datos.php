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

        <!-- Formulario de búsqueda -->
        <form id="searchForm">
            <input type="text" id="referencia" placeholder="Buscar por referencia" value="<?php echo isset($_GET['referencia']) ? htmlspecialchars($_GET['referencia']) : ''; ?>">
            <input type="number" id="numero_caja" placeholder="Buscar por número de caja" value="<?php echo isset($_GET['numero_caja']) ? htmlspecialchars($_GET['numero_caja']) : ''; ?>">
            <button type="button" onclick="filterData()">Buscar</button>
        </form>

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

        // Obtener los parámetros de búsqueda
        $referencia = isset($_GET['referencia']) ? $conn->real_escape_string($_GET['referencia']) : '';
        $numero_caja = isset($_GET['numero_caja']) ? (int)$_GET['numero_caja'] : '';

        // Construir la consulta SQL con filtros
        $sql = "SELECT id, referencias, des_Item, cantidad, `num-caja`, fecha_registro 
                FROM tiendaempaques 
                WHERE 1=1";
        if ($referencia !== '') {
            $sql .= " AND referencias LIKE '%$referencia%'";
        }
        if ($numero_caja !== '') {
            $sql .= " AND `num-caja` = $numero_caja";
        }
        $sql .= " ORDER BY fecha_registro DESC";

        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            echo "<table id='dataTable'>
                    <thead>
                        <tr>
                            <th>Referencia</th>
                            <th>Descripción del ítem</th>
                            <th>Cantidad</th>
                            <th>Número de caja</th>
                            <th>Fecha de registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";
            // Salida de cada fila de los resultados
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['referencias']}</td>
                        <td>{$row['des_Item']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['num-caja']}</td>
                        <td>{$row['fecha_registro']}</td>
                        <td><a href='editar_datos.php?id={$row['id']}'><img style='width: 20px; height: 20px;' src='edit_icon.png' alt='Editar' title='Editar'>editar</a></td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No hay datos registrados.";
        }

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

        function filterData() {
            const referencia = document.getElementById('referencia').value;
            const numero_caja = document.getElementById('numero_caja').value;
            
            // Obtener URL de la página actual
            const url = new URL(window.location.href);
            
            // Actualizar los parámetros de la URL
            if (referencia) url.searchParams.set('referencia', referencia);
            else url.searchParams.delete('referencia');
            
            if (numero_caja) url.searchParams.set('numero_caja', numero_caja);
            else url.searchParams.delete('numero_caja');
            
            // Redirigir a la nueva URL
            window.location.href = url.toString();
        }
    </script>
</body>
</html>
