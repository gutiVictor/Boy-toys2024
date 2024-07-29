<?php
$file = 'productos.json';
$productos = json_decode(file_get_contents($file), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $ref = $_POST['ref'];

    // Agregar o editar el producto
    $productos[$codigo] = [
        'descripcion' => $descripcion,
        'ref' => $ref
    ];

    // Guardar los cambios en el archivo JSON
    file_put_contents($file, json_encode($productos, JSON_PRETTY_PRINT));

    // Redirigir de nuevo al formulario
    header('Location: form_productos.php');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Eliminar el producto
    unset($productos[$codigo]);

    // Guardar los cambios en el archivo JSON
    file_put_contents($file, json_encode($productos, JSON_PRETTY_PRINT));

    // Redirigir de nuevo al formulario
    header('Location: form_productos.php');
    exit();
}
?>
