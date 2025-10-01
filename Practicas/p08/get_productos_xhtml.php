<?php
    header("Content-Type: application/xhtml+xml; charset=utf-8");

    if(isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }

    if (!empty($tope)) {
        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', 'bebecarlo', 'marketzone');

        /** comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }

        $productos = [];

        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope")) {
            $productos = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        }

        $link->close();

        /** Salida en XHTML */
        echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <title>Productos con unidades menores o iguales a <?php echo htmlspecialchars($tope); ?></title>
</head>

<body>
    <h1>Productos con ≤ <?php echo htmlspecialchars($tope); ?> unidades</h1>
    <?php if (count($productos) > 0): ?>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <?php foreach(array_keys($productos[0]) as $col): ?>
                <th><?php echo htmlspecialchars($col); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto): ?>
            <tr>
                <?php foreach($producto as $valor): ?>
                <td><?php echo htmlspecialchars($valor); ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No se encontraron productos con ≤ <?php echo htmlspecialchars($tope); ?> unidades.</p>
    <?php endif; ?>
</body>

</html>
<?php
    }
?>