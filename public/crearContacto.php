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
<body>
<header>
    <!-- header con el link a la pagina de home y otro para deslogearse y volver al login -->
    <a href="home.php">Inicio</a>
    <a href="logOut.php">LogOut</a>
    <hr>
</header>
    <hr>
    <h1>ELIGE LA OPCION QUE QUIERES REALIZAR</h2>
    <h3>Opcion 1: </h3>
    <!-- link que lleva a crearPersona.php -->
    <a href="crearPersona.php">Crear contacto de persona.</a>
    <hr>
    <h3>Opcion 2: </h3>
    <!-- link que lleva a crearEmpresa.php -->
    <a href="crearEmpresa.php">Crear contacto de empresa.</a>
</body>
</html>