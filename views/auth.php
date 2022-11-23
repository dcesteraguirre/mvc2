<?php

    require_once 'conexion.php';
    session_start();


    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
        $user = $_POST['usuario'];
        $password = $_POST['password'];
        $sql = "SELECT $password FROM creedenciales WHERE usuario = '$user'";
        $resultados = $bd->query($sql);
        
        $verificado = false;
        
        if(password_verify($password,$)){
            $_SESSION['logueado'] = true;
            header("Location: views/home.php");
        }
        else{
            $_SESSION['logueado'] = false;
            header("Location: ../public/index.php");
        }

    }
    else{
        header("Location: ../public/index.php");
    }