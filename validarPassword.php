<?php

    require_once 'conexion.php';
    session_start();


    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
        $user = $_POST['usuario'];
        $password = $_POST['password'];
        $sql = "SELECT $password FROM creedenciales WHERE usuario = '$user'";
        $resultados = $bd->query($sql);
        
        if($sql=true){
            $_SESSION['logueado'] = true;
            header("Location: public/home.php");
        }
        else{
            $_SESSION['logueado'] = false;
            header("Location: public/index.php");
        }

    }
    else{
        echo "<br><h2>Introduce usuario y contraseña</h2>";
        header("Location: public/index.php");
    }