<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basico </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>PHP Basico</h1>
    <hr>
    <section>
    <h2>variables</h2>
    <?php
        $nombre = "Josue Huarsaya <br>";
        echo "Nombre: " . $nombre;

        $edad = 65;
        echo "Edad: " . $edad . "<br>";

        $profesor = true;
        echo "Es profesor? " . $profesor . "<br>";

        $talla = 1.70;
        echo "talla: " . $talla . "<br>";
        ?>
        <h2>constantes</h2>
        <?php
        define("PI", 3.141516);
        echo "valor de PI: " . PI . "<br>";

        ?>
        <hr>

        
        <h2 style="color: red;">OPERADORES</h2>
        <h2 style="color: red;">Ejemplo 1, hecho en clases</h2>
        
        <?php
        $edad = 25;
        $esEstudiante = true;
        if ($edad > 18 && $esEstudiante) {
            echo"Es mayor de edad y estudiante.";
        }

        echo '<h2 style="color: red;">Ejemplo 2</h2>';
        // Operadores Lógicos
        $edad = 3 ;
        $tieneLicencia = true;
        if ($edad >= 18 && $tieneLicencia) {
            echo "Puede conducir<br>";
        }
         else{
            echo "no pude conducir";
        }

        echo '<h2 style="color: red;">Ejemplo 3</h2>';
        // Operadores de Asignación
        $x = 10;
        $x += 55;
        echo "x vale: $x <br>";
        ?>
        <hr>

        <?php
        echo '<h2 style="color: orange;">CONTROL DE FLUJO</h2>';

        echo '<h2 style="color: orange;">Ejemplo 1.Hecho en clases </h2>';

        date_default_timezone_set('America/Lima');

        $hora_actual = date("H:i");
        $hora_limite = "11:15";

        if ($hora_actual < $hora_limite) {
            echo "salida";
        } else {
            echo "todavía en clases";
        }

        echo '<h2 style="color: orange;">Ejemplo 2</h2>';
        // IF - ELSE
        $nota = 2;
        if ($nota >= 11) {
            echo "Aprobado<br>";
        } else {
            echo "Desaprobado<br>";
        }

        echo '<h2 style="color: orange;">Ejemplo 3</h2>';
        // SWITCH
        $dia = "lunes";
        switch ($dia) {
            case "lunes":
                echo "Inicio de semana<br>";
                break;
            case "miércoles":
                echo "Mitad de semana<br>";
                break;
            default:
                echo "Día cualquiera<br>";
        }

        ?>
        <hr>

        <?php

        echo '<h2 style="color: green;">BUCLES</h2>';

        echo '<h2 style="color: green;">Ejemplo 1</h2>';
        // FOR
        for ($i = 4; $i <= 20; $i++) {
            echo "repetecion $i<br>";
        }

        echo '<h2 style="color: green;">Ejemplo 2</h2>';
        // WHILE
        $k = 0;
        while ($k < 3) {
            echo "Valor de k: $k<br>";
            $k++;
        }

        ?>
        <hr>
        <hr>

        <?php
        echo '<h2 style="color: blue;">FUNCIONES</h2>';

        echo '<h2 style="color: blue;">Ejemplo 1</h2>';
        // Función con Parámetros
        function saludar($nombre)
        {
            echo "Hola, $nombre<br>";
        }
        saludar("diego");

        echo '<h2 style="color: blue;">Ejemplo 2</h2>';
        // Función con Retorno
        function multiplicar($a, $b)
        {
            return $a * $b;
        }
        echo "Multiplicación: " . multiplicar(10, 10) . "<br>";
        ?>
        <hr>

        <?php
        echo '<h2 style="color: purple;">ARREGLOS</h2>';

        echo '<h2 style="color: purple;">Ejemplo 1</h2>';
        // Arreglo Indexado
        $frutas = ["manzana", "pera", "uva"];
        echo "Fruta 1: " . $frutas[0] . "<br>";
        echo "Fruta 2: " . $frutas[1] . "<br>";
        echo "Fruta 3: " . $frutas[2] . "<br>";
        
        ?>
</body>

</html>