<?php

    require_once 'conexion.php';
    session_start();


    if(isset($_POST['usuario']) && !empty($_POST["usuario"]) ){
        $user = $_POST['nombreautor'];
        $sql = "SELECT * FROM login WHERE username = " . $user . "'";
        $resultados = $bd->query($sql);
        

    }
    else{
        echo "<br><h2>No has introducido ningun autor</h2>";
    }