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
    <a href="home.php">Inicio</a>
    <a href="logOut.php">LogOut</a>
    <hr>
</header>
<h1>INTRODUCE EL NOMBRE DEL CONTACTO QUE QUIERES ELIMINAR</h1>
<form name ="eliminarContacto" action="" method="POST">
    <p>
        <label for="usuario">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <input type="submit" name="envio" id="envio" value="Entrar">

    <?php

        require_once '../conexion.php';

        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $sql = "DELETE * FROM contacto WHERE nombre = '$nombre'";
            // $sql = "INSERT INTO contactos(nombre, apellidos, direccion, telefono) VALUES ('$nombre', '$apellidos', '$direccion', '$telefono')";
            //la variable resultados es un objeto PDO que contiene la sentencia sql
            $resultados = $bd->query($sql);
            echo "<br><br>";

            if($resultados = true){
                echo "Se han borrado el contacto llamado $nombre de la base de datos.";
            }
            else{
                echo "No se ha podido borrar el contacto de la base de datos. Asegurese de introducir bien el nombre.";
            }
        }
        else{
            echo "Introduce los datos en los parámetros requeridos.";
        }

    ?>
</body>
</html>

