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
    <!-- header con el link a la pagina de home y otro para deslogearse y volver al login -->
<header>
    <a href="home.php">Inicio</a>
    <a href="logOut.php">LogOut</a>
    <hr>
</header>
<h1>BUSCAR UN CONTACTO POR SU NOMBRE.</h1>
<!-- formulario que recibe por teclado el nombre si se autoenvía a través de post -->
<form name ="buscarContacto" action="" method="POST">
    <p>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <input type="submit" name="envio" id="envio" value="Enviar">

    <?php
    // require_once para acceder a la variable $bd que tiene los datos de la base de datos para acceder a ella
    // y poder realizar sentencias
        require_once '../conexion.php';
        //comprabmos que el nombre ha sido enviado en el formulario, sino pedirá introducir los datos
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $sql = "SELECT * FROM contactos WHERE nombre = '$nombre'";
            //Realizamos la sentencia sql definida previamente
            $resultados = $bd->query($sql);
            echo "<br><br>";
            // recorremos el array e introducimos cada uno de sus datos en $row
            foreach($resultados as $row){
            ?>
                <tr>
                <!-- mostramos por pantalla el resultado de la busqueda de los datos de esa fila a través del nombre -->
                    <td><?php echo "Nombre: " . $row['nombre'] . "<br>"?></td>
                    <td><?php echo "Apellidos: " . $row['apellidos'] . "<br>"?></td>
                    <td><?php echo "Direccion: " . $row['direccion'] . "<br>"?></td>
                    <td><?php echo "Telefono: " . $row['telefono'] . "<br>"?></td>
                    <td><?php echo "Email: " . $row['email'] . "<br>"?></td>
                </tr>
            <?php
            }
            //si se realiza la sentencia se mostrará un mensaje mostrando que se ha realizado
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

    ?>
</body>
</html>