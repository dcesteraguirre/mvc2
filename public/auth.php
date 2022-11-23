<?php
    require_once '../conexion.php';
    session_start();


    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
        $user = $_POST['usuario'];
        $password = $_POST['password'];
        $sql = "SELECT password FROM credenciales WHERE usuario = '$user'; ";
        //la variable resultados es un objeto PDO que contiene la sentencia sql
        $resultados = $bd->query($sql);

        //transformamos el objeto PDO en un array para que sea un valor válido dentro de los parámetro de password_verify
        foreach($resultados as $valor){
            if(password_verify($password,$valor[0])){
                $_SESSION['logueado'] = true;
                header("Location: home.php");
            }
            else{
                $_SESSION['logueado'] = false;
                header("Location: index.php");
            }
        }
   
    }
    else{
        header("Location: index.php");
    }