<?php
/*  MySQL conexión */
$link = mysqli_connect("localhost", "root", "yisshanli", "marketzone");

// Chequea la conexión
if ($link === false) {
    die("ERROR: No pudo conectarse con la base de datos. " . mysqli_connect_error());
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = mysqli_real_escape_string($link, $_POST['id']); // El ID del producto que se va a editar
    $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
    $marca = mysqli_real_escape_string($link, $_POST['marca']);
    $modelo = mysqli_real_escape_string($link, $_POST['modelo']);
    $precio = mysqli_real_escape_string($link, $_POST['precio']);
    $unidades = mysqli_real_escape_string($link, $_POST['unidades']);
    $detalles = mysqli_real_escape_string($link, $_POST['detalles']);
    $imagen = mysqli_real_escape_string($link, $_POST['imagen']);

    // Crear la consulta SQL de actualización
    $sql = "
        UPDATE productos 
        SET 
            nombre = '$nombre',
            marca = '$marca',
            modelo = '$modelo',
            precio = '$precio',
            unidades = '$unidades',
            detalles = '$detalles',
            imagen = '$imagen'
        WHERE id = '$id'
    ";

    // Ejecutar la consulta
    if (mysqli_query($link, $sql)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "ERROR: No se pudo ejecutar la actualización. " . mysqli_error($link);
    }
    } else {
        echo "No se recibieron datos por POST.";
    }

// Cerrar la conexión
mysqli_close($link);
?>
