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

