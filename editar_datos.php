<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // Preparar SQL para leer los datos específicos
    $sql = "SELECT referencias, des_Item, cantidad, `num-caja` FROM tiendaempaques WHERE id = $id";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontraron datos.";
        exit();
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_EditarDatos.css">
    <link rel="icon" href="LOGO-BOY-TOYS.png" type="image/png">
    <title>Editar Datos</title>
</head>
<body>
    <div class="container">
        <header>
            <img src="LOGO-BOY-TOYS.png" alt="Boytoys" class="logo"/>
        </header>
        <main>
            <h1>Editar Datos</h1>

            <form action="procesar_edicion.php" method="post" class="edit-form">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <div class="form-group">
                    <label for="referencia">Referencia:</label>
                    <input type="text" id="referencia" name="referencia" value="<?php echo htmlspecialchars($row['referencias']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción del ítem:</label>
                    <input type="text" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($row['des_Item']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($row['cantidad']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="numero_caja">Número de caja:</label>
                    <input type="number" id="numero_caja" name="numero_caja" value="<?php echo htmlspecialchars($row['num-caja']); ?>" required>
                </div>

                <div class="button-container">
                    <button type="submit">Actualizar</button>
                    <button type="button" onclick="navigateTo('leer_datos.php')">Cancelar</button>
                </div>
            </form>
        </main>
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
