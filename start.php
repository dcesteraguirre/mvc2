<?php
    //echo"<h2>Contendo PRIVADO</h2>";

    // /recurso/accion/parametro
        // recurso : controladores
        // accion : metodos del controladores . controlador -> show() , find
        // parametro : find -> de producto

    require_once "../Controller.php";

    $app = new Controller();
    //defino variable de peticion en la url


    // 1- recoger el metodo que pasan como parametro y si no
    // especifican ningun caragar el metodo home
    if(isset($_GET["method"])){
         $method = $_GET["method"]; //show, find, create, update... 
    }else{
        $method = "home";
    }

    // 2 - verificar que el metodo introducido existe.
    if(method_exists($app,$method)){
        $app->$method();
    }else{
        http_response_code(404);
        die("Metodo no entotrado"); //exit;
    }
        
    

    $app->$method;
