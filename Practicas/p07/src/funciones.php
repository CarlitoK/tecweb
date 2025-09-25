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

        foreach ($letras as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }

        echo '</table>';

    }

    function postEDAD(){
        if(isset($_POST["gender"]) && isset($_POST["edad"])) {
            $gender = $_POST["gender"];
            $edad = $_POST["edad"];
            
            if($gender == "Femenino"){
                if(($edad >= 18) && ($edad <= 35)){
                    echo "<p Bienvenida, usted está en el rango de edad permitido.</p>";
                } else {
                    echo '<h3>Edad no válida para mostrar mensaje (debe ser entre 18-35 años)</h3>';
                }
            } elseif($gender == "Masculino"){
                if(($edad >= 18) && ($edad <= 35)){
                    echo "Bienvenido, usted está en el rango de edad permitido.</p>";
                } else {
                    echo '<h3>Edad no válida para mostrar mensaje (debe ser entre 18-35 años)</h3>';
                }
            } else {
                echo '<h3>Género no válido</h3>';
            }
        } else {
            echo '<h3>Por favor completa todos los campos</h3>';
        }
    }
    function buscarPorMatricula($matricula, $parque) {
        $matricula = strtoupper(trim($matricula));
        
        if (array_key_exists($matricula, $parque)) {
            return $parque[$matricula];
        }
        return null;
    }

// Función para mostrar todos los autos
    function mostrarTodosLosAutos($parque) {
        return $parque;
    }

// Función para validar formato de matrícula
    function validarMatricula($matricula) {
        // Formato: 3 letras seguidas de 4 números (ej: ABC1234)
        return preg_match('/^[A-Z]{3}[0-9]{4}$/', strtoupper(trim($matricula)));
    }

    $parqueVehicular = array(
    "ABC1234" => array(
        "Auto" => array(
            "Marca" => "Toyota",
            "Modelo" => "2020",
            "Tipo" => "sedan"
        ),
        "Propietario" => array(
            "Nombre" => "Juan Pérez García",
            "Ciudad" => "México DF",
            "Dirección" => "Av. Reforma 123, Col. Centro"
        )
    ),
    "XYZ5678" => array(
        "Auto" => array(
            "Marca" => "Honda",
            "Modelo" => "2019",
            "Tipo" => "hatchback"
        ),
        "Propietario" => array(
            "Nombre" => "María González López",
            "Ciudad" => "Guadalajara",
            "Dirección" => "Calle Morelos 456, Col. Americana"
        )
    ),
    "DEF9012" => array(
        "Auto" => array(
            "Marca" => "Ford",
            "Modelo" => "2021",
            "Tipo" => "camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Carlos Rodríguez Martín",
            "Ciudad" => "Monterrey",
            "Dirección" => "Blvd. Constitución 789, Col. Del Valle"
        )
    ),
    "GHI3456" => array(
        "Auto" => array(
            "Marca" => "Chevrolet",
            "Modelo" => "2018",
            "Tipo" => "sedan"
        ),
        "Propietario" => array(
            "Nombre" => "Ana Martínez Silva",
            "Ciudad" => "Puebla",
            "Dirección" => "Av. Juárez 321, Col. Centro Histórico"
        )
    ),
    "JKL7890" => array(
        "Auto" => array(
            "Marca" => "Nissan",
            "Modelo" => "2022",
            "Tipo" => "hatchback"
        ),
        "Propietario" => array(
            "Nombre" => "Roberto Sánchez Cruz",
            "Ciudad" => "Tijuana",
            "Dirección" => "Calle Revolución 654, Col. Zona Centro"
        )
    ),
    "MNO2468" => array(
        "Auto" => array(
            "Marca" => "Volkswagen",
            "Modelo" => "2020",
            "Tipo" => "sedan"
        ),
        "Propietario" => array(
            "Nombre" => "Laura Hernández Ruiz",
            "Ciudad" => "Mérida",
            "Dirección" => "Calle 60 #987, Col. Centro"
        )
    ),
    "PQR1357" => array(
        "Auto" => array(
            "Marca" => "Mazda",
            "Modelo" => "2021",
            "Tipo" => "camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Diego López Morales",
            "Ciudad" => "León",
            "Dirección" => "Blvd. López Mateos 147, Col. La Martinica"
        )
    ),
    "STU9876" => array(
        "Auto" => array(
            "Marca" => "Hyundai",
            "Modelo" => "2019",
            "Tipo" => "hatchback"
        ),
        "Propietario" => array(
            "Nombre" => "Patricia Jiménez Vega",
            "Ciudad" => "Querétaro",
            "Dirección" => "Av. Universidad 258, Col. Centro Sur"
        )
    ),
    "VWX5432" => array(
        "Auto" => array(
            "Marca" => "Kia",
            "Modelo" => "2022",
            "Tipo" => "sedan"
        ),
        "Propietario" => array(
            "Nombre" => "Fernando Castro Delgado",
            "Ciudad" => "Cancún",
            "Dirección" => "Av. Tulum 369, Col. Centro"
        )
    ),
    "YZA8765" => array(
        "Auto" => array(
            "Marca" => "Seat",
            "Modelo" => "2020",
            "Tipo" => "hatchback"
        ),
        "Propietario" => array(
            "Nombre" => "Sofía Ramírez Torres",
            "Ciudad" => "Toluca",
            "Dirección" => "Calle Lerdo 741, Col. Centro"
        )
    ),
    "BCD4321" => array(
        "Auto" => array(
            "Marca" => "Renault",
            "Modelo" => "2021",
            "Tipo" => "camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Alejandro Moreno Paz",
            "Ciudad" => "Veracruz",
            "Dirección" => "Av. Independencia 852, Col. Centro"
        )
    ),
    "EFG6543" => array(
        "Auto" => array(
            "Marca" => "Peugeot",
            "Modelo" => "2018",
            "Tipo" => "sedan"
        ),
        "Propietario" => array(
            "Nombre" => "Gabriela Flores Mendoza",
            "Ciudad" => "Oaxaca",
            "Dirección" => "Calle Macedonio Alcalá 963, Col. Centro"
        )
    ),
    "HIJ0987" => array(
        "Auto" => array(
            "Marca" => "Suzuki",
            "Modelo" => "2022",
            "Tipo" => "hatchback"
        ),
        "Propietario" => array(
            "Nombre" => "Ricardo Vargas Herrera",
            "Ciudad" => "Acapulco",
            "Dirección" => "Costera Miguel Alemán 159, Col. Hornos"
        )
    ),
    "KLM7531" => array(
        "Auto" => array(
            "Marca" => "Mitsubishi",
            "Modelo" => "2019",
            "Tipo" => "camioneta"
        ),
        "Propietario" => array(
            "Nombre" => "Valeria Ortega Campos",
            "Ciudad" => "Chihuahua",
            "Dirección" => "Av. Juárez 753, Col. Centro"
        )
    ),
    "NOP2640" => array(
        "Auto" => array(
            "Marca" => "Subaru",
            "Modelo" => "2021",
            "Tipo" => "sedan"
        ),
        "Propietario" => array(
            "Nombre" => "Mauricio Aguilar Ramos",
            "Ciudad" => "Saltillo",
            "Dirección" => "Blvd. Venustiano Carranza 864, Col. República"
        )
    )
);


?>