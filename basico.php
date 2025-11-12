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
            echo "Nombre: ". $nombre;

            $edad = 65;
            echo "Edad: ".$edad."<br>";

            $profesor = true;
            echo "Es profesor? ".$profesor."<br>";

            $talla = 1.70;
            echo "talla: ".$talla."<br>";
        ?>
        <h2>constantes</h2>
        <?php
        define("PI",3.141516);
        echo "valor de PI: ". PI ."<br>";
        ?>


    </section>
    <hr>
    <section>
        <h2> control de flujo</h2>
<?php
    date_default_timezone_set('America/Lima');

    $hora_actual = date("H:i");
    $hora_limite = "11:15";

    if ($hora_actual < $hora_limite) {
        echo "salida";
    } else {
        echo "todavía en clases";
        
    }
?>


    </section>
</body>
</html>