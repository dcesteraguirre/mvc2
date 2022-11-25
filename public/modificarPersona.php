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
<form name ="modificarPersona" action="" method="POST">
    <p>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <input type="submit" name="envio" id="envio" value="Enviar">

    <?php
    
        require_once '../conexion.php';

        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $sql = "SELECT * FROM contactos WHERE nombre = '$nombre'";

            $resultados = $bd->query($sql);
            echo "<br><br><h3>DATOS ACTUALES DE LA PERSONA A MODIFICAR</h3>";
            
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
            ?>
            <form name ="modificarDatosPersona" action="" method="POST">
            <p>
                <label for="nombreModificar">Nombre: </label>
                <input type="text" name="nombreModificar" id="nombreModificar">
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
            <input type="submit" name="modificar" id="modificar" value="Modificar">
            <?php
            if(isset($_POST['nombreModificar']) && !empty($_POST['nombreModificar']) && isset($_POST['apellidos']) && !empty($_POST['apellidos']) 
            && isset($_POST['direccion']) && !empty($_POST['direccion']) && isset($_POST['telefono']) && !empty($_POST['telefono'])){
                $nombreModificar = $_POST['nombreModificar'];
                $apellidos = $_POST['apellidos'];
                $direccion = $_POST['direccion'];
                $telefono = $_POST['telefono'];
                $email = "";
                $sql = "UPDATE contactos SET nombre='$nombreModificar', apellidos='$apellidos', direccion='$direccion', telefono='$telefono', email='$email'";
                $resultados = $bd->query($sql);
                echo "<br><br>";
    
                if($resultados == true){
                    echo "Se han actualizado los datos de $nombreModificar en la base de datos.";
                }
                else{
                    echo "No se ha podido actualizar los datos en la base de datos.";
                }
            }
            else{
                echo "Introduce los datos en los parámetros requeridos.";
            }

        }
        else{
            echo "Introduce un nombre para ver los datos a modificar.";
        }
            ?>
</body>
</html>