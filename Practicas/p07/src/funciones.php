<?php
    function esMultiploDe5y7($num) {
        if ($num%5==0 && $num%7==0)
        {
            echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        }
        else
        {
            echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        }
    }

    function postNameEmail() {
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    }

    function esImpar($num) {
        return $num%2!=0;
    }

    function esPar($num) {
        return $num%2==0;
    }

    function generarSecuencia(){
        $matriz = [];
        $iteraciones = 0;
        $numerosGenerados = 0;
        $encontrado = false;
        do{
            $num1 = rand(0,1000);
            $num2 = rand(0,1000);
            $num3 = rand(0,1000);

            $iteraciones++;
            $numerosGenerados +=3;

            $matriz[]=[$num1,$num2,$num3];

            if(esImpar($num1) && esPar($num2) && esImpar($num3)){
                $encontrado = true;
            }
        }while(!$encontrado);

        echo $numerosGenerados." números obtenidos en ".$iteraciones." iteraciones";
    }

    function generarEntero($num){
        $multiplo = false;
        while(!$multiplo){
            $numeroRandom = rand(0,1000);
            if($numeroRandom%$num == 0){
                echo "<p>El numero ".$numeroRandom." es multiplo de ".$num."</p>";
                $multiplo = true;
            }
        }
    }

    function generarEnteroGET($num){
        $multiplo = false;
        do{
            $numeroRandom = rand(0,1000);
            if($numeroRandom%$num == 0){
                echo "<p>El numero ".$numeroRandom." es multiplo de ".$num."</p>";
                $multiplo = true;
            }
        }while(!$multiplo);
    }



    function crearArreglo(){
        $letras = array();

        for($i=97;$i<=122;$i++){
            $letras[$i]=chr($i);
        }

        echo '<h3>Tabla con foreach:</h3>';
        echo '<table>';
        echo '<tr>';
        echo '<th>Índice (Código ASCII)</th>';
        echo '<th>Letra</th>';
        echo '</tr>';   

// Crear tabla usando foreach
        foreach ($letras as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }

        echo '</table>';

    }

?>