<?php
    session_start();
    if(!isset($_SESSION['logeado']) || !$_SESSION['logueado']){
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
</body>
</html>