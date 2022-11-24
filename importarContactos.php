<?php

    require_once "conexion.php";
    //Ruta donde se encuentra el arhvivo xml a importar
    $archivo = simplexml_load_file("bd/agenda.xml");

    $sql_delete = "DROP TABLE agenda";
    $borrarTabla = $bd->query($sql_delete);

    $sql_create = "CREATE TABLE contacto(tipo varchar(50), nombre varchar(20);
     apellidos varchar(40), direccion(50), telefono int(20))";


    if($bd->query($sql_create) === true){
        echo "La tabla se ha creado correctamente <br>";
    }else{
        echo "Hubo un error al crear la tabla: "; 
    }

    foreach($archivo as $contacto){
        echo "DATOS DEL XML <br>";
        echo "Nombre: " . $contacto->NOMBRE ."<br>";
        echo "Apellidos: " . $contacto->APELLIDOS ."<br>";
        echo "Direccion: " . $contacto->DIRECCION ."<br>";
        echo "Telefono: " . $contacto->TELEFONO ."<br>";

        //Insertamos los datos
        $sql_insert = "INSERT INTO contacto VALUES('$contacto->NOMBRE', '$contacto->APELLIDOS', 
        '$direccion->DIRECCION', '$telefono->TELEFONO')";


        if($bd->query($sql_insert) === true){
            echo "Se ha inseretado correctamente<br>";
        }
        else{
            echo "Hubo un error al insertar en la tabla<br>";
        }
    }


