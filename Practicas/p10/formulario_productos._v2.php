<?php

$link = new mysqli('localhost', 'root', 'yisshanli', 'marketzone');
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}

// Si se recibe un ID, obtener los datos del producto desde la BD
$id = $_GET['id'] ?? $_POST['id'] ?? '';
$nombre = '';
$marca_actual = '';
$modelo = '';
$precio = '';
$unidades = '';
$detalles_actuales = '';
$imagen = '';

if (!empty($id)) {
    $query = "SELECT * FROM productos WHERE id = '$id'";
    $result = $link->query($query);

    if ($result && $result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        $nombre = $producto['nombre'];
        $marca_actual = $producto['marca'];
        $modelo = $producto['modelo'];
        $precio = $producto['precio'];
        $unidades = $producto['unidades'];
        $detalles_actuales = $producto['detalles'];
        $imagen = $producto['imagen'];
    } else {
        echo "<script>alert('El producto con ID $id no existe.'); window.location.href='get_productos_vigentes_v2.php';</script>";
        exit;
    }
}
$link->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Edición de Producto</title>
    <style>
        ol, ul { list-style-type: none; }
    </style>
</head>
<body>
    <h1>Edición de Producto</h1>
    <form id="miFormulario" method="post" action="update_producto.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"> <!-- Campo oculto para el ID -->
        <fieldset>
            <legend>Actualiza los datos del producto:</legend>
            <ul>
                <li><label>Nombre:</label> 
                    <input type="text" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                </li>
                <li><label for="marca">Marca:</label>
                    <select id="marca" name="marca" required>
                        <option value="">Selecciona Editorial</option>
                        <option <?= ($marca_actual == 'Penguin Random House') ? 'selected' : '' ?>>Penguin Random House</option>
                        <option <?= ($marca_actual == 'HarperCollins') ? 'selected' : '' ?>>HarperCollins</option>
                        <option <?= ($marca_actual == 'Grupo Planeta') ? 'selected' : '' ?>>Grupo Planeta</option>
                        <option <?= ($marca_actual == 'Simon & Schuster') ? 'selected' : '' ?>>Simon & Schuster</option>
                    </select>
                </li>
                <li><label>Modelo:</label> 
                    <input type="text" name="modelo" value="<?= htmlspecialchars($modelo) ?>">
                </li>
                <li><label>Precio:</label> 
                    <input type="number" step="0.01" min="0" name="precio" value="<?= htmlspecialchars($precio) ?>">
                </li>
                <li><label>Unidades:</label> 
                    <input type="number" min="1" name="unidades" value="<?= htmlspecialchars($unidades) ?>">
                </li>
                <li><label for="detalles">Detalles:</label><br>
                    <textarea name="detalles" rows="4" cols="50" id="detalles"><?= htmlspecialchars($detalles_actuales) ?></textarea>
                </li>
                <li><label>Ruta Imagen:</label> 
                    <input type="text" name="imagen" value="<?= htmlspecialchars($imagen) ?>">
                </li>
            </ul>
        </fieldset>
        <p>
            <input type="submit" value="ACTUALIZAR PRODUCTO">
            <input type="reset" value="RESTAURAR VALORES">
        </p>
    </form>
</body>
</html>
