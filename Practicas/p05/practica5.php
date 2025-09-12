<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Practica 5</title>
</head>
<body>
    <h1>Variables</h1>
    <p>Definir variables y mostrar el contenido</p>
    <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;   

        echo "<h3>Contenido de las variables</h3>";
        echo "<p>Variable a: $a</p>";
        echo "<p>Variable b: $b</p>";
        echo "<p>Variable c: $c</p>";
    ?>

    <p>Reasignar las variables</p>
    <?php
        $a = "PHP server";
        $b = &$a;

        echo "<h3>Contenido de las variables</h3>";
        echo "<p>Variable a: $a</p>";
        echo "<p>Variable b: $b</p>";
        echo "<p>Variable c: $c</p>";


        echo '<h4>¿Que ocurrió en el segundo bloque?:</h4>';   

        echo '<ul>';
        echo '<li>Lo importante es que $c nunca se reasignó directamente. Como $c fue creada como referencia a $a desde el principio ($c = &$a), cuando $a cambia de valor, $c automáticamente refleja ese nuevo valor porque ambas variables apuntan a la misma ubicación de memoria.
                Ahora tienes tres variables ($a, $b, y $c) que todas referencian el mismo valor: "PHP server".</li>';
        echo '</ul>';

    ?>
    <?php


// =================================================================
// EJERCICIO 3: Mostrar contenido después de cada asignación
// =================================================================
echo "<h2>Ejercicio 3: Evolución de variables</h2>\n";

$a = "PHP5";
echo "Después de \$a = \"PHP5\": ";
var_dump($a);
echo "<br>\n";

$z[] = &$a;
echo "Después de \$z[] = &\$a: ";
echo "z = "; var_dump($z);
echo "a = "; var_dump($a);
echo "<br>\n";

$b = "5a version de PHP";
echo "Después de \$b = \"5a version de PHP\": ";
var_dump($b);
echo "<br>\n";

$c = $b*10;
echo "Después de \$c = \$b*10: ";
var_dump($c);
echo "Nota: PHP convierte '5a version de PHP' a 5 para operación matemática<br>\n";

$a .= $b;
echo "Después de \$a .= \$b: ";
var_dump($a);
echo "<br>\n";

$b *= $c;
echo "Después de \$b *= \$c: ";
var_dump($b);
echo "Nota: PHP convierte la cadena a número para multiplicación<br>\n";

$z[0] = "MySQL";
echo "Después de \$z[0] = \"MySQL\": ";
echo "z = "; var_dump($z);
echo "a = "; var_dump($a);
echo "Nota: Como \$z[0] era referencia a \$a, cambiar \$z[0] cambia \$a<br><br>\n";

// =================================================================
// EJERCICIO 4: Variables con $GLOBALS
// =================================================================
echo "<h2>Ejercicio 4: Variables con \$GLOBALS</h2>\n";

// Reiniciamos las variables para este ejercicio
$a = "PHP5";
$z[] = &$a;
$b = "5a version de PHP";
$c = $b*10;
$a .= $b;
$b *= $c;
$z[0] = "MySQL";

echo "Valores usando \$GLOBALS:<br>\n";
echo "\$GLOBALS['a'] = "; var_dump($GLOBALS['a']); echo "<br>\n";
echo "\$GLOBALS['b'] = "; var_dump($GLOBALS['b']); echo "<br>\n";
echo "\$GLOBALS['c'] = "; var_dump($GLOBALS['c']); echo "<br>\n";
echo "\$GLOBALS['z'] = "; var_dump($GLOBALS['z']); echo "<br>\n";

echo "<br>Valores usando modificador global en función:<br>\n";
function mostrarVariablesGlobales() {
    global $a, $b, $c, $z;
    echo "Con global - a = "; var_dump($a); echo "<br>\n";
    echo "Con global - b = "; var_dump($b); echo "<br>\n";
    echo "Con global - c = "; var_dump($c); echo "<br>\n";
    echo "Con global - z = "; var_dump($z); echo "<br>\n";
}
mostrarVariablesGlobales();

// =================================================================
// EJERCICIO 5: Nuevos valores de variables
// =================================================================
echo "<h2>Ejercicio 5: Nuevos valores al final del script</h2>\n";

$a = "7 personas";
$b = (integer) $a;
$a = "9E3";
$c = (double) $a;

echo "Después de las nuevas asignaciones:<br>\n";
echo "\$a = "; var_dump($a); echo "<br>\n";
echo "\$b = "; var_dump($b); echo " (conversión de '7 personas' a entero)<br>\n";
echo "\$c = "; var_dump($c); echo " (conversión de '9E3' a double)<br><br>\n";



// =================================================================
// EJERCICIO 6: Valores booleanos y var_dump
// =================================================================
echo "<h2>Ejercicio 6: Valores booleanos con var_dump</h2>\n";

// Definimos las variables
$a = "0";
$b = "TRUE";
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);

echo "Variables booleanas:<br>\n";
echo "\$a = \"0\": "; var_dump($a); echo "<br>\n";
echo "\$b = \"TRUE\": "; var_dump($b); echo "<br>\n";
echo "\$c = FALSE: "; var_dump($c); echo "<br>\n";
echo "\$d = (\$a OR \$b): "; var_dump($d); echo "<br>\n";
echo "\$e = (\$a AND \$c): "; var_dump($e); echo "<br>\n";
echo "\$f = (\$a XOR \$b): "; var_dump($f); echo "<br><br>\n";

echo "Investigación - Función para transformar booleano en echo:<br>\n";
echo "La función <strong>var_export()</strong> permite mostrar valores booleanos de forma legible:<br>\n";
echo "\$c con var_export(): "; var_export($c); echo "<br>\n";
echo "\$d con var_export(): "; var_export($d); echo "<br>\n";

echo "<br>También se puede usar conversión a string:<br>\n";
echo "\$c como string: '" . ($c ? 'true' : 'false') . "'<br>\n";
echo "\$d como string: '" . ($d ? 'true' : 'false') . "'<br><br>\n";

