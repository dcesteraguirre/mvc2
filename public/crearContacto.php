<?php
    require_once '../conexion.php';
    session_start();
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
    <hr>
    <h1>ELIGE LA OPCION QUE QUIERES REALIZAR</h2>
    <h3>Opcion 1: </h3>
    <a href="crearPersona.php">Crear contacto de persona.</a>
    <hr>
    <h3>Opcion 2: </h3>
    <a href="crearEmpresa.php">Crear contacto de empresa.</a>
</body>
</html>