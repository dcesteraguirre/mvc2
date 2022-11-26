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
<header>
    <a href="home.php">Inicio</a>
    <a href="logOut.php">LogOut</a>
    <hr>
</header>
<body>
    <h1>ELIGE SI QUIERES MODIFICAR LOS DATOS DE UNA PERSONA O DE UNA EMPRESA</h1>
    <h3>Opcion 1: </h3>
    <a href="modificarPersona.php">Modificar persona de la base de datos.</a>
    <hr>
    <h3>Opcion 2: </h3>
    <a href="modificarEmpresa.php">Modificar empresa de la base de datos.</a>
</body>
</html>