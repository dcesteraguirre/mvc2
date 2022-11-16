<?php
namespace Dwes\Galaxias\Pegaso;
    const RADIO = 0.75; //millone de años luz

    function observar($mensaje){
        echo"<br>Estoy dirigiendome a la galaxia " . $mensaje;
    }

class Galaxia{

    function __construct()
    {
        $this->nacimiento();
    }

    function nacimiento(){
        echo "<br>Soy una galaxia nueva";
    }

    static function muerte(){
        echo "<br>Me estoy destruyendo.";
    }

}