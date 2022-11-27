<?php
    // require_once para acceder a la variable $bd que tiene los datos de la base de datos para acceder a ella
    // y poder realizar sentencias
    require_once '../conexion.php';
    //iniciarmos session para que guarde los datos
    session_start();

    //si hemos mandado un usuario en el formulario y una contraseña, los guardará en variables para despúes realizar una sentencia sql
    //a la tabla creedenciales, donde seleccionará todoss los datos su el usuario coincide con el usuario introducido.
    //si no introducimos datos nos mandará de nuevo al formulario
    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])){
        $user = $_POST['usuario'];
        $password = $_POST['password'];
        $sql = "SELECT password FROM credenciales WHERE usuario = '$user'; ";
        //la variable resultados realizar la sentencia ssql a través de PDO declarado previamente $bd
        $resultados = $bd->query($sql);

        //transformamos el objeto PDO en un array para que sea un valor válido dentro de los parámetro de password_verify
        //si coincide se logueara dentro del programa y sino te mandará de nuevo al formulario de login
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