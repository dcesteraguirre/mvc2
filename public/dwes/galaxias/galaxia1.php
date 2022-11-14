<?php

    const RADIO = 1.25; //millone de años luz

    function observar($mensaje){
        echo"<br>EStoy mirando a la galaxia " . $mensaje;
    }

class Galaxia{

    function __construct()
    {
        $this->nacimiento();
    }

    function nacimiento(){
        echo "<br>Soy una nueva galaxia";
    }

    static function muerte(){
        echo "<br>Me destruyo!!";
    }

}