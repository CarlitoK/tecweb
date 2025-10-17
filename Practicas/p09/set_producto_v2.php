<?php
$nombre = $_POST['name'];
$marca = $_POST['branch'];
$modelo = $_POST['model'];
$precio = $_POST['price'];
$detalles = $_POST['details'];
$unidades = $_POST['units'];
$imagen = $_POST['image'];

@$link = new mysqli('localhost', 'root', 'bebecarlo', 'marketzone');

if ($link->connect_errno) {
    $error = 'Falló la conexión: ' . $link->connect_error;
} else {
   
    if (empty($nombre) || empty($marca) || empty($modelo) || empty($precio) || empty($unidades)) {
        $error = 'Error: Todos los campos son obligatorios.';
    } else {
       
        $sql_check = "SELECT id FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'";
        $resultado = $link->query($sql_check);
       
        if ($resultado->num_rows > 0) {
            $error = 'Error: Un producto con el mismo nombre, marca y modelo ya existe en la base de datos.';
        } else {
            // QUERY COMENTADA (ANTIGUA):
            // $sql_insert = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', '{$eliminado}' )";
            // Esta query es riesgosa porque depende del orden exacto de las columnas en la tabla.
            // Si la estructura de la tabla cambia, la inserción puede fallar o insertar datos en columnas incorrectas.
            
            // NUEVA QUERY CON COLUMN NAMES:
            $sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
                           VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
           
            if ($link->query($sql_insert)) {
                $id_insertado = $link->insert_id;
                $exito = true;
            } else {
                $error = 'Error: No se pudo insertar el producto. ' . $link->error;
            }
        }
    }
   
    $link->close();
}

// Generar respuesta XHTML
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resultado de la Inserción</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .exito {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .resumen {
            background-color: #e7f3ff;
            border: 1px solid #b3d9ff;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .resumen p {
            margin: 8px 0;
        }
        .resumen strong {
            display: inline-block;
            width: 120px;
        }
        a {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Resultado de la Operación</h1>
    
    <?php if (isset($exito) && $exito): ?>
        <div class="exito">
            <h2>¡Producto insertado exitosamente!</h2>
            <p>El producto ha sido registrado en la base de datos con ID: <strong><?php echo $id_insertado; ?></strong></p>
        </div>
        
        <div class="resumen">
            <h3>Resumen de los datos insertados:</h3>
            <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
            <p><strong>Marca:</strong> <?php echo $marca; ?></p>
            <p><strong>Modelo:</strong> <?php echo $modelo; ?></p>
            <p><strong>Precio:</strong> $<?php echo $precio; ?></p>
            <p><strong>Detalles:</strong> <?php echo $detalles; ?></p>
            <p><strong>Unidades:</strong> <?php echo $unidades; ?></p>
            <p><strong>Imagen URL:</strong> <?php echo $imagen; ?></p>
        </div>
    <?php elseif (isset($error)): ?>
        <div class="error">
            <h2>Operación Fallida</h2>
            <p><?php echo $error; ?></p>
        </div>
    <?php endif; ?>
    
    <a href="http://localhost/tecweb/practicas/p09/index.html">Volver al formulario</a>
</body>
</html>