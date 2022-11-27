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
        // require_once para acceder a la variable $bd que tiene los datos de la base de datos para acceder a ella
        // y poder realizar sentencias
        require_once '../conexion.php';
        // comprobamos si se ha mandado los datos de nombre, apellidos, telefono y email a través del forumalario, y sino te muestra un mensaje
        // para indicar que hay que rellenarlos
        if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellidos']) && !empty($_POST['apellidos']) 
        && isset($_POST['direccion']) && !empty($_POST['direccion']) && isset($_POST['telefono']) && !empty($_POST['telefono'])){
             // guardamos los datos enviados con el post en variables
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = "";
            $sql = "INSERT INTO contactos VALUES('$nombre', '$apellidos', '$direccion', '$telefono', '$email')";
            //Realizamos la sentencia sql definida previamente
            $resultados = $bd->query($sql);
            echo "<br><br>";
            //si se realiza la sentencia se mostrará un mensaje mostrando que se ha realizado
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

