<?php
    session_start();
    if(!isset($_SESSION['logueado']) || !$_SESSION['logueado']){
        header("Location: index.php");
    }           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>El usuario está en la bbdd</h1>
    <?php

        require_once '../conexion.php';

        //Ruta donde se encuentra el arhvivo xml a importar
        $archivo = simplexml_load_file("../bd/agenda.xml");

        //Sentencia para borrar la tabla en caso de que exista antes
        $sql_delete="DROP TABLE contactos";
        $bd->query($sql_delete);

        //Sentencia apra crear la tabla
        $sql_create="CREATE TABLE `contactos` (
            `nombre` varchar(40) NOT NULL,
            `apellidos` varchar(40) NOT NULL,
            `direccion` varchar(40) NOT NULL,
            `telefono` varchar(10) NOT NULL,
            `email` varchar(40) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $bd->query($sql_create);



        foreach($archivo as $contacto){
            echo "DATOS DEL XML <br>";
            echo "Nombre: " . $contacto->nombre ."<br>";
            echo "Apellidos: " . $contacto->apellidos ."<br>";
            echo "Direccion: " . $contacto->direccion ."<br>";
            echo "Telefono: " . $contacto->telefono ."<br>";
            echo "Email: " . $contacto->email . "<br>";

            //Insertamos los datos
            $sql_insert = "INSERT INTO contactos VALUES('$contacto->nombre', '$contacto->apellidos', 
            '$contacto->direccion', '$contacto->telefono', '$contacto->email')";
            $bd->query($sql_insert);

        }

    ?>
</body>
</html>