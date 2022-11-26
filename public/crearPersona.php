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
<h1>FORMULARIO PARA INTRODUCIR UNA PERSONA EN LA BASE DE DATOS</h1>
<form name ="formularioContactoPersona" action="" method="POST">
    <p>
        <label for="usuario">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <p>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" id="apellidos">
    </p> 
    <p>
        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion">
    </p>
    <p>
        <label for="telefono">Teléfono: </label>
        <input type="number" name="telefono" id="telefono">
    </p>
    <input type="submit" name="envio" id="envio" value="Entrar">

    <?php

        require_once '../conexion.php';

        if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellidos']) && !empty($_POST['apellidos']) 
        && isset($_POST['direccion']) && !empty($_POST['direccion']) && isset($_POST['telefono']) && !empty($_POST['telefono'])){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = "";
            $sql = "INSERT INTO contactos VALUES('$nombre', '$apellidos', '$direccion', '$telefono', '$email')";
            
            $resultados = $bd->query($sql);
            echo "<br><br>";

            if($resultados == true){
                echo "Se han introducio los datos en la base de datos.";
            }
            else{
                echo "No se ha podido introducir los datos en la base de datos.";
            }
        }
        else{
            echo "Introduce los datos en los parámetros requeridos.";
        }

    ?>
</body>
</html>

