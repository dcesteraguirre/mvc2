<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>LOGIN</h1>
    <form name ="login" action="../validarPassword.php" method="POST">
    <p>
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario">
    </p>
    <p>
        <label for="password">Contraseña: </label>
        <input type="password" name="password" id="password">
    </p>

    <input type="submit" name="envio" id="envio" value="Entrar">

    <?php echo 'Contenido en public<br>';
    require "../start.php";?>    

</body>
</html>


