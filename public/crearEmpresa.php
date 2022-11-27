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
<h1>FORMULARIO PARA INTRODUCIR UNA EMPRESA EN LA BASE DE DATOS</h1>
<!-- formulario que recibe varios datos escritos y se reenvía a si mismo a través de envioy por post -->
<form name ="formularioContactoEmpresa" action="" method="POST">
    <p>
        <label for="usuario">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <p>
        <label for="direccion">Direccion: </label>
        <input type="text" name="direccion" id="direccion">
    </p> 
    <p>
        <label for="telefono">Dirección: </label>
        <input type="text" name="telefono" id="telefono">
    </p>
    <p>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
    </p>
    <input type="submit" name="envio" id="envio" value="Enviar">

    <?php
        // require_once para acceder a la variable $bd que tiene los datos de la base de datos para acceder a ella
    // y poder realizar sentencias
        require_once '../conexion.php';
        // comprobamos si se ha mandado los datos de nombre, direccion, telefono y email a través del forumalario, y sino te muestra un mensaje
        // para indicar que hay que rellenarlos
        if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['direccion']) && !empty($_POST['direccion']) 
        && isset($_POST['telefono']) && !empty($_POST['telefono']) && isset($_POST['email']) && !empty($_POST['email'])){
            $nombre = $_POST['nombre'];
            $apellidos = "";
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $sql = "INSERT INTO contactos VALUES('$nombre', '$apellidos', '$direccion', '$telefono', '$email')";
            //Realizamos la sentencia sql definida previamente
            $resultados = $bd->query($sql);
            echo "<br><br>";

            if($resultados == true){
                echo "Se han introducido los datos en la base de datos.";
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