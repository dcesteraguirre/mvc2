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
    <a href="home.php">Inicio</a>
    <a href="logOut.php">LogOut</a>
    <hr>
</header>
<h1>MODFICAR LOS DATOS DE UN CONTACTO PERSONA.</h1>
<form name ="modificarContacto" action="" method="POST">
    <p>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <input type="submit" name="envio" id="envio" value="Enviar">

    <?php
    /*
        require_once '../conexion.php';

        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            ?>
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
            <input type="submit" name="envio" id="envio" value="Modificar">
        }

            /*
            $nombre = $_POST['nombre'];
            $sql = "SELECT * FROM contactos WHERE nombre = '$nombre'";
            
            $resultados = $bd->query($sql);
            echo "<br><br>";
            
            foreach($resultados as $row){
            ?>
                <tr>
                    <td><?php echo "Nombre: " . $row['nombre'] . "<br>"?></td>
                    <td><?php echo "Apellidos: " . $row['apellidos'] . "<br>"?></td>
                    <td><?php echo "Direccion: " . $row['direccion'] . "<br>"?></td>
                    <td><?php echo "Telefono: " . $row['telefono'] . "<br>"?></td>
                    <td><?php echo "Email: " . $row['email'] . "<br>"?></td>
                </tr>
            <?php
            }

            if($resultados == true){
                echo "<br> Se han mostrado los datos del contacto $nombre correctamente.";
            }
            else{
                echo "No se han podido mostrar los datos del contacto $nombre. Asegurate de introducir bien el nombre.";
            }
        }
        else{
            echo "Introduce los datos en los parámetros requeridos.";
        }
      
      */  
    ?>

</body>
</html>