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
<form name ="modificarPersona" action="" method="POST">
        <br><h3>INTRODUCE LOS DATOS PARA MODIFICARLOS</h3>
        <form name ="modificarDatosPersona" action="" method="POST">
        <p>
            <label for="nombre">Nombre de la persona a modificar: </label>
            <input type="text" name="nombre" id="nombre">
        </p>
        <p>
            <label for="nombreNuevo">Nombre nuevo: </label>
            <input type="text" name="nombreNuevo" id="nombreNuevo">
        </p>
        <p>
            <label for="apellidosNuevo">Apellidos nuevos: </label>
            <input type="text" name="apellidosNuevo" id="apellidosNuevo">
        </p> 
        <p>
            <label for="direccionNueva">Dirección nueva: </label>
            <input type="text" name="direccionNueva" id="direccionNueva">
        </p>
        <p>
            <label for="telefonoNuevo">Teléfono nuevo: </label>
            <input type="number" name="telefonoNuevo" id="telefonoNuevo">
        </p>

        <input type="submit" name="modificar" id="modificar" value="Modificar">
        
        <?php
        require_once '../conexion.php';

        if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['nombreNuevo']) && !empty($_POST['nombreNuevo']) && isset($_POST['apellidosNuevo']) && !empty($_POST['apellidosNuevo']) 
        && isset($_POST['direccionNueva']) && !empty($_POST['direccionNueva']) && isset($_POST['telefonoNuevo']) && !empty($_POST['telefonoNuevo'])){
            $nombre = $_POST['nombre'];
            $nombreNuevo = $_POST['nombreNuevo'];
            $apellidosNuevo = $_POST['apellidosNuevo'];
            $direccionNueva = $_POST['direccionNueva'];
            $telefonoNuevo = $_POST['telefonoNuevo'];
            $emailNuevo = "";
            $sql_Update= "UPDATE contactos SET nombre='$nombreNuevo', apellidos='$apellidosNuevo', direccion='$direccionNueva', telefono='$telefonoNuevo', email='$emailNuevo' WHERE nombre='$nombre'";
            $resultadosUpdate = $bd->query($sql_Update);
            echo "<br><br>";

            if($resultadosUpdate == true){
                echo "Se han actualizado los datos de $nombre en la base de datos.";
            
            }
            else{
                echo "No se ha podido actualizar los datos en la base de datos.";
            }

            $sql = "SELECT * FROM contactos WHERE nombre = '$nombreNuevo'";
            
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
                echo "<br> Se han mostrado los datos actualizados de $nombreNuevo.";
            }

        }
        else{
            echo "Introduce los datos en los parámetros requeridos.";
        }
    
        ?>
</body>
</html>