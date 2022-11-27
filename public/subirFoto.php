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
    <!-- añadimos la foto que queremos subir de nuestra maquina mediante enctype señalamos que hay una carga de archivo para que no lo omita, y la autoenviamos -->
    <!-- con post a través del submit -->
    <form name ="subirFoto" action="" method="POST" enctype="multipart/form-data">
    Añadir imagen: <input name="archivo" id="archivo" type="file"/>
    <input type="submit" name="subir" value="Subir imagen"/>
</body>
</html>
<?php
    
    //Comprobamos que se ha subido una foto a través del submit subir
    if (isset($_POST['subir'])) {
        //Recogemos el archivo enviado por el formulario
        $archivo = $_FILES['archivo']['name'];
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "pdf") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 5242880))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .pdf, .jpg, .png. y de 500 kb como máximo.</b></div>';
        }
        else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, '../uploads/'.$archivo)) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('../uploads/'.$archivo, 0777);
                //Mostramos el mensaje de que se ha subido co éxito
                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                //Mostramos la imagen subida
                echo '<p><img src="../uploads/'.$archivo.'"></p>';
            }
            else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
        }
    }
?>
