<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>

<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        require_once ("src/funciones.php");
        esMultiploDe5y7($_GET["numero"])  
    ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        postNameEmail()
    ?>
    <h2>Ejercicio 2</h2>
    <p>Programa para la generación repetitiva de 3
        números aleatorios hasta obtener impar,par,impar</p>
    <?php
        generarSecuencia()
    ?>
    <h2>Ejercicio 3.1</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
        pero que además sea múltiplo de un número dado.</p>

    <form action="" method = "post">
        <label for="numero">Ingresa un número: </label>
        <input type="number" name="numero" id="numero">
        <input type="submit" value="enviar">
    </form>
    <?php 
        if (isset($_POST['numero']) && $_POST['numero'] != '') {
            $numero = (int)$_POST['numero'];
            generarEntero($numero);
        }
    ?>

    <h2>Ejercicio 3.2</h2>
    <p>Crear una variante de este script utilizando el ciclo do-while, el número dado se debe obtener vía GET.</p>

    <?php
        //generarEnteroGET(isset($_GET["num"]));
    ?>
    
    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
    a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
    el valor en cada índice.</p>

    <?php
        crearArreglo();
    ?>

    <h2>Ejercicio 5</h2>
    <p>Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
    sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
    bienvenida apropiado.</p>

     <form action="http://localhost/tecweb/practicas/p07/index.php" method = "post">
         <label for="gender">Selecciona tu género: </label>

         <ul>
            <li><input type="radio" name="gender" value="Femenino">Femenino</li>
            <li><input type="radio" name="gender" value="Masculino">Masculino</li>
            <br>
            <li>Edad: <input type="number" name="edad" id="edad"></li>
            <br>
            <input type="submit" value="Enviar">
         </ul>
         
    </form>
    <?php
        postEDAD();
    ?>
    <h2>Ejercicio 6</h2>
    <p>Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
    una ciudad.</p>

    <h3> Consultar por Matrícula</h3>
            <form method="post" action="">
                <label for="matricula">Ingrese la matrícula (Formato: ABC1234):</label><br />
                <input type="text" id="matricula" name="matricula" placeholder="Ej: ABC1234" maxlength="7" />
                <input type="submit" name="buscar" value="Buscar Vehículo" />
            </form>
        <h3> Ver Todos los Vehículos</h3>
            <form method="post" action="">
                <input type="submit" name="mostrar_todos" value="Mostrar Todo el Parque Vehicular" />
            </form>
    <?php
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Búsqueda por matrícula
            if (isset($_POST['buscar']) && !empty($_POST['matricula'])) {
                $matriculaBuscar = $_POST['matricula'];
                
                if (!validarMatricula($matriculaBuscar)) {
                    echo '<div class="error"> Formato de matrícula inválido. Use el formato: ABC1234 (3 letras y 4 números)</div>';
                } else {
                    $vehiculo = buscarPorMatricula($matriculaBuscar, $parqueVehicular);
                    
                    if ($vehiculo) {
                        echo '<div class="success"> Vehículo encontrado:</div>';
                        echo '<div class="vehiculo">';
                        echo '<div class="matricula"> Matrícula: ' . strtoupper($matriculaBuscar) . '</div>';
                        
                        echo '<div class="info-auto">';
                        echo '<h4> Información del Auto</h4>';
                        echo '<strong>Marca:</strong> ' . $vehiculo['Auto']['Marca'] . '<br />';
                        echo '<strong>Modelo:</strong> ' . $vehiculo['Auto']['Modelo'] . '<br />';
                        echo '<strong>Tipo:</strong> ' . ucfirst($vehiculo['Auto']['Tipo']) . '<br />';
                        echo '</div>';
                        
                        echo '<div class="info-propietario">';
                        echo '<h4> Información del Propietario</h4>';
                        echo '<strong>Nombre:</strong> ' . $vehiculo['Propietario']['Nombre'] . '<br />';
                        echo '<strong>Ciudad:</strong> ' . $vehiculo['Propietario']['Ciudad'] . '<br />';
                        echo '<strong>Dirección:</strong> ' . $vehiculo['Propietario']['Dirección'] . '<br />';
                        echo '</div>';
                        
                        echo '</div>';
                    } else {
                        echo '<div class="error"> No se encontró ningún vehículo con la matrícula: ' . strtoupper($matriculaBuscar) . '</div>';
                    }
                }
            }
            
           
            if (isset($_POST['mostrar_todos'])) {
                $todosLosAutos = mostrarTodosLosAutos($parqueVehicular);
                
              
                
                echo '<h2> Listado Completo del Parque Vehicular</h2>';
                
                foreach ($todosLosAutos as $matricula => $vehiculo) {
                    echo '<div class="vehiculo">';
                    echo '<div class="matricula"> Matrícula: ' . $matricula . '</div>';
                    
                    echo '<div class="info-auto">';
                    echo '<h4>🔧 Información del Auto</h4>';
                    echo '<strong>Marca:</strong> ' . $vehiculo['Auto']['Marca'] . '<br />';
                    echo '<strong>Modelo:</strong> ' . $vehiculo['Auto']['Modelo'] . '<br />';
                    echo '<strong>Tipo:</strong> ' . ucfirst($vehiculo['Auto']['Tipo']) . '<br />';
                    echo '</div>';
                    
                    echo '<div class="info-propietario">';
                    echo '<h4>👤 Información del Propietario</h4>';
                    echo '<strong>Nombre:</strong> ' . $vehiculo['Propietario']['Nombre'] . '<br />';
                    echo '<strong>Ciudad:</strong> ' . $vehiculo['Propietario']['Ciudad'] . '<br />';
                    echo '<strong>Dirección:</strong> ' . $vehiculo['Propietario']['Dirección'] . '<br />';
                    echo '</div>';
                    
                    echo '</div>';
                }
            }
        }
    ?>
</body>

</html>