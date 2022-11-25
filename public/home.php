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
    <header>
    <h1>El usuario está en la bbdd</h1>
    <hr>
    <h4>Opciones:</h4>
    <a href="home.php">Inicio</a>
    <a href="crearContacto.php">Crear Contacto</a>
    <a href="eliminarContacto.php">Eliminar Contacto</a>
    <a href="buscarContacto.php">Buscar un Contacto</a>
    <a href="actualizarContacto.php">Actualizar/modificar un Contacto</a>
    <a href="logOut.php">LogOut</a>
    </header>
    <br>
    <hr>
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


        echo "<h2>Datos del xml introducidos en la base de datos.</h2><br>";
        foreach($archivo as $contacto){
            ?><hr>
            <?php
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