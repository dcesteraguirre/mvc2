<?php
    //iniciamos sesion, si previamente no se ha creado la sesion logueado mandará automaticamente al login
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
<header>
    <!-- header con el link a la pagina de home y otro para deslogearse y volver al login -->
    <a href="home.php">Inicio</a>
    <a href="logOut.php">LogOut</a>
    <hr>
</header>
<body>
    <h1>ELIGE SI QUIERES MODIFICAR LOS DATOS DE UNA PERSONA O DE UNA EMPRESA</h1>
    <h3>Opcion 1: </h3>
     <!-- link que lleva a modificarPersona.php -->
    <a href="modificarPersona.php">Modificar persona de la base de datos.</a>
    <hr>
    <h3>Opcion 2: </h3>
    <!-- link que lleva a modificarEmpresa.php -->
    <a href="modificarEmpresa.php">Modificar empresa de la base de datos.</a>
</body>
</html>