<?php

$link = new mysqli('localhost', 'root', 'bebecarlo', 'marketzone');
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}

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
<html>

<head>
    <meta charset="utf-8">
    <title>Edición de Producto</title>
    <style type="text/css">
        ol, ul { 
            list-style-type: none;
        }
    </style>
    <script src="validacion.js"></script>
</head>

<body>
    <h1>Edición de Producto</h1>

    <form id="formularioTenis" action="update_producto.php" method="post" onsubmit="return validarFormulario()">
        
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <h2>Información del Producto</h2>

        <fieldset>
            <ul>
                <li><label for="form-name">Nombre:</label> 
                    <input type="text" name="name" id="form-name" value="<?= htmlspecialchars($nombre) ?>">
                </li>
                <li><label for="form-branch">Marca:</label> 
                    <select name="branch" id="form-branch">
                        <option value="">Selecciona una marca</option>
                        <option value="Nike" <?= ($marca_actual == 'Nike') ? 'selected' : '' ?>>Nike</option>
                        <option value="Adidas" <?= ($marca_actual == 'Adidas') ? 'selected' : '' ?>>Adidas</option>
                        <option value="Puma" <?= ($marca_actual == 'Puma') ? 'selected' : '' ?>>Puma</option>
                        <option value="Reebok" <?= ($marca_actual == 'Reebok') ? 'selected' : '' ?>>Reebok</option>
                        <option value="Under Armour" <?= ($marca_actual == 'Under Armour') ? 'selected' : '' ?>>Under Armour</option>
                        <option value="New Balance" <?= ($marca_actual == 'New Balance') ? 'selected' : '' ?>>New Balance</option>
                        <option value="Converse" <?= ($marca_actual == 'Converse') ? 'selected' : '' ?>>Converse</option>
                        <option value="Vans" <?= ($marca_actual == 'Vans') ? 'selected' : '' ?>>Vans</option>
                    </select>
                </li>
                <li><label for="form-model">Modelo:</label> 
                    <input type="text" name="model" id="form-model" value="<?= htmlspecialchars($modelo) ?>">
                </li>
                <li><label for="form-price">Precio:</label>
                    <input type="number" name="price" id="form-price" step="0.01" value="<?= htmlspecialchars($precio) ?>">
                </li>
                <li><label for="form-details">Detalles:</label><br>
                    <textarea name="details" rows="4" cols="60" id="form-details" placeholder="No más de 250 caracteres de longitud"><?= htmlspecialchars($detalles_actuales) ?></textarea>
                </li>
                <li><label for="form-units">Unidades:</label>
                    <input type="number" name="units" id="form-units" value="<?= htmlspecialchars($unidades) ?>">
                </li>
                <li><label for="form-image">Imagen URL:</label>
                    <input type="text" name="image" id="form-image" value="<?= htmlspecialchars($imagen) ?>">
                </li>
            </ul>
        </fieldset>

        <p>
            <input type="submit" value="Actualizar Producto">
            <input type="reset" value="Restaurar Valores">
        </p>

    </form>
</body>
</html>