<?php
$dsn = "mysql:dbname=demo;host=db";
$usuario = "dbuser";
$password = "secret";

    // * 1- preparar la consulta -> prepare
    // * 2 - vincular los datos -> bindParam / bindValue
    // * 3 - ejecuar la sentencia -> execute(); (query, exec)

try{
    $db = new PDO($dsn,$usuario,$password);
    //establece el nivel de error que muestra en la conexion
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    
    $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (:nombre,:clave) ");
    $nombre = "Juan";
    $clave1 = "1234";
    //en la zona de $nombre iria $_GET y el value del formulario
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":clave",$clave1);



    //al sobreescribir las variables la sentencia mete los ultimos valores metidos
    $nombre = "Pedro";
    $clave1 = "789";
    $sentencia->execute(); //ejecutar la sentencia

    echo "<br><h2>Exito</h2>";


     
} catch(PDOException $e){
    echo "Error producido al conectar: " . $e->getMessage();
    //throw $th;
}