<hr/>
<?php
echo "<div><h1 style=\"border-width:3px;border-style:groove;background-color:#ffcc99;\">";
echo "Final de la página PHP<br/>";
echo "Vínculos útiles: ";
echo "<a href=\"https://php.net\">php.net</a>&nbsp; ";
echo "<a href=\"https://mysql.org\">mysql.org</a>";
echo "</h1>";

echo "Nombre del archivo ejecutado: " . $_SERVER['PHP_SELF'] . "&nbsp;&nbsp;&nbsp;";
echo "Nombre del archivo incluido: " . __FILE__ . "</div>";
?>
</body>
</html>