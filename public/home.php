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
    <h1>El usuario está en la bbdd</h1>
    <hr>
    <h4>Opciones:</h4>
    <a href="home.php">Inicio</a>
    <a href="crearContacto.php">Crear Contacto</a>
    <a href="eliminarContacto.php">Eliminar Contacto</a>
    <a href="buscarContacto.php">Buscar un Contacto</a>
    <a href="opcionesModificacion.php">Actualizar/modificar un Contacto</a>
    <a href="subirFoto.php">SubirFoto</a>
    <a href="logOut.php">LogOut</a>
    </header>
    <br>
    <hr>
    <form name ="xmlIntroducir" action="" method="POST">
    <input type="submit" name="introducir" id="introducir" value="Meter datos del XML">
    <form name ="borrar" action="" method="POST">
    <input type="submit" name="borrarDatos" id="borrarDatos" value="Limpiar Tabla Contactos">
    
</form>
    <?php

        require_once '../conexion.php';

        //Ruta donde se encuentra el arhvivo xml a importar
        $archivo = simplexml_load_file("../bd/agenda.xml");


        //Sentencia apra crear la tabla
        $sql_create="CREATE TABLE IF NOT EXISTS `contactos` (
            `nombre` varchar(40) NOT NULL,
            `apellidos` varchar(40) NOT NULL,
            `direccion` varchar(40) NOT NULL,
            `telefono` varchar(10) NOT NULL,
            `email` varchar(40) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $tablaCreada = $bd->query($sql_create);
        if($tablaCreada == true){
            echo "<br>La tabla contactos ha sido creada exitosamente<br>";
        }
        else{
            echo "<br>No se ha podido crear la tabla contactos.<br>";
        }

        if(isset($_POST['introducir'])){
        
            echo "<h2>Datos del xml introducidos en la base de datos.</h2><br>";
            foreach($archivo as $contacto){
                ?><hr>
                <?php
                echo "DATOS DEL XML <br>";
                echo "Nombre: " . $contacto->nombre ."<br>";
                echo "Apellidos: " . $contacto->apellidos ."<br>";
                echo "Direccion: " . $contacto->direccion ."<br>";
                echo "Telefono: " . $contacto->telefono ."<br>";
                echo "Email: " . $contacto->email . "<br>";

                //Insertamos los datos
                $sql_insert = "INSERT INTO contactos VALUES('$contacto->nombre', '$contacto->apellidos', 
                '$contacto->direccion', '$contacto->telefono', '$contacto->email')";
                $bd->query($sql_insert);

            }
        }
        else{
            echo "";
        }

        if(isset($_POST['borrarDatos'])){
        
            $sql_limpiar="DELETE FROM contactos";
            $tablaLimpiada = $bd->query($sql_limpiar);
            if($tablaLimpiada == true){
                echo "<br>Se han borrado todas las filas de la tabla contactos.";
            }
            else{
                echo "<br>No se ha podido limpiar la tabla contactos.";
            }
        }

    ?>

</body>
</html>