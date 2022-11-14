<?php
    require_once "Product.php";

    class Controller
    {
        function __construct()
        {
            //conts vacio
        }

        /* funcion que:
          - accede todos los productos
          - llama a vista de inventario
          */
        public function home(){
            $products = Product::all();
            require "views/home.php";
        }
        //  funcion que:
        //   - mostrar un producto en particular, el id como parametro
        //   - llamar vista de un producto en concreto.
        public function show(){
            $id = $_GET["id"];
            $product = Product::find($id);
            require "views/show.php";
        }
        
    }//fin clase
    