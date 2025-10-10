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
        // QUERY MODIFICADA: Ahora filtra por unidades <= tope Y eliminado = 0
        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope AND eliminado = 0")) {
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
    <title>Productos no eliminados con unidades menores o iguales a <?php echo htmlspecialchars($tope); ?></title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Productos no eliminados con ≤ <?php echo htmlspecialchars($tope); ?> unidades</h1>
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
    <p>No se encontraron productos no eliminados con ≤ <?php echo htmlspecialchars($tope); ?> unidades.</p>
    <?php endif; ?>
</body>
</html>
<?php
    }
?>