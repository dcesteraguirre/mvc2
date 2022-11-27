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
<h1>INTRODUCE EL NOMBRE DEL CONTACTO QUE QUIERES ELIMINAR</h1>
<form name ="eliminarContacto" action="" method="POST">
    <p>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <input type="submit" name="borrar" id="borrar" value="Borrar">

    <?php
        // require_once para acceder a la variable $bd que tiene los datos de la base de datos para acceder a ella
        // y poder realizar sentencias
        require_once '../conexion.php';
        // comprobamos si se ha mandado los datos de nombre, y sino te muestra un mensaje
        // para indicar que hay que rellenarlo
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
             // guardamos los datos enviados con el post en variables
            $nombre = $_POST['nombre'];
            $sql = "DELETE FROM contactos WHERE nombre = '$nombre'";
            //Realizamos la sentencia sql definida previamente
            $resultados = $bd->query($sql);
            echo "<br><br>";
            //si se realiza la sentencia se mostrará un mensaje mostrando que se ha realizado
            if($resultados == true){
                echo "Se han borrado el contacto llamado $nombre de la base de datos.";
            }
            else{
                echo "No se ha podido borrar el contacto de la base de datos.";
            }
        }
        else{
            echo "Introduce los datos en los parámetros requeridos.";
        }

    ?>
</body>
</html>

