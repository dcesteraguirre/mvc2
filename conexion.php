<?php
    // declaramos la variable $dsn, que cotneine el nombre de la base de datos y el nombre del host
    // la variaable $usuarioo contiene el nombre del usuario que tiene privilegios en la base de datos
    // la variabble $clave contiene la contraseña deñ usuario root para acceder a la base de datos
    $dsn = "mysql:dbname=agenda;host=db";
     $usuario = "root";
     $clave = "password";
    // decalarmaos la variable $bd que es un objeto PDO con las variable declaradas anteriormente para acceder a la base de datos cuando se la llam
    // si no se consigue realizar saltará una PDOexception
    try {
        $bd = new PDO($dsn,$usuario,$clave);

    } catch (PDOException $e){
        echo "<br>Mensaje de la excepcion : " . $e->getMessage();
    }