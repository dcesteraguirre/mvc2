<?php
/*
    - Si no la url no especifica ningun controlador (recuros) => asingo
    uno por defecto => home
    - Si no la url no especifica ningun metodo => asigno por defecto : index

    /recuros/accion/parametros

    */

class App{
    function __construct()
    {
        if(isset($_GET["url"]) && !empty($_GET["url"])){
            $url = $_GET["url"];
        }else{
            $url = "home";
        }

         // /product/show/5 -> product: recurso ; show: accion ; 5: parametro
        $arguments = explode('/', trim($url,'/'));
        $controllerName = array_shift($arguments); // product ; ProductController
        $controllerName = ucwords($controllerName) . "Controller";


        if(count($arguments) > 0){
            $method = array_shift($arguments); //show
        }else{
            $method = "index";
        }

        // voy a cargar el controlador. ProductController.php
        $file = "../app/controllers/$controllerName" . ".php";
        if(file_exists($file)){
            require_once $file; //importo el fichero si existe;
        }else{
            http_response_code(404);
            die("No encontrado");
        }

        //existe el metodo en el controlador?

        $controllerObject = new $controllerName; //objeto de la clase
        if(method_exists($controllerObject,$method)){
            $controllerObject->$method($arguments);
        }else{
            http_response_code(404);
            die("No encontrado");
        }

        
    }//fin_construct
}//fin _app