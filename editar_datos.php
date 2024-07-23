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
    <link rel="stylesheet" href="style_LeerDatos.css">
    <link rel="icon" href="LOGO-BOY-TOYS.png" type="image/png">
    <title>Editar Datos</title>
</head>
<body>
    <div class="main">
        <div class="header">
            <img src="LOGO-BOY-TOYS.png" alt="Boytoys" />
        </div>
        <h1>Editar Datos</h1>

        <form action="procesar_edicion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="referencia">Referencia:</label>
            <input type="text" id="referencia" name="referencia" value="<?php echo $row['referencias']; ?>" required><br>

            <label for="descripcion">Descripción del ítem:</label>
            <input type="text" id="descripcion" name="descripcion" value="<?php echo $row['des_Item']; ?>" required><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo $row['cantidad']; ?>" required><br>

            <label for="numero_caja">Número de caja:</label>
            <input type="number" id="numero_caja" name="numero_caja" value="<?php echo $row['num-caja']; ?>" required><br>

            <div class="button-container">
                <button type="submit">Actualizar</button>
                <button type="button" onclick="navigateTo('leer_datos.php')">Cancelar</button>
            </div>
        </form>
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
