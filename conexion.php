<?php
    $dsn = "mysql:dbname=agenda;host=db";
     $usuario = "root";
     $clave = "password";

    try {
        $bd = new PDO($dsn,$usuario,$clave);

    } catch (PDOException $e){
        echo "<br>Mensaje de la excepcion : " . $e->getMessage();
    }