<?php

class Login{

    protected $nombreusu = null;//se debe llamar igual que la columna
    protected $password = null;
    
    //recuperar filas
    /**
     * 1- preparar la consulta -> prepare
     * 2- establecer el modo de recuperacion: FETCH_CLASS, FETCH_ASSOC
     * 3- ejecutar la consulta ->execute
     * 4- Recuperar los registros : fetch(un registro) / fetchAll (devuelve todos los registros)
     */

    public static function all(){
        $dsn = "mysql:host=db;dbname=demo";
        $usuario = "dbuser";
        $password = "secret";

        try{
            $db = new PDO($dsn,$usuario,$password);
            //establece el nivel de error que muestra en la conexion
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM credenciales";
            $sentencia = $db->prepare($sql);
            //establece la forma de recuperar registros.
            $sentencia->setFetchMode(PDO::FETCH_CLASS,"Login");
            $sentencia->execute(); //3 ejecuta la sentencia

            $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS,"Login");
            foreach($credenciales as $credencial){
                echo "<br>NOMBRE : " . $credencial->nombreusu;
                echo "<br>CONTRASEÑA : " . $credencial->password;
            }

            // while( $obj = $sentencia->fetch()){
            //     //print_r($obj);
            //     echo"<br>NOMBRE : " . $obj->nombreusu;
            //     echo"<br>CONTRASEÑA : " . $obj->password;
            // }//finwhile


        } catch(PDOException $e){
            echo "<br>Error conexion : " . $e->getMessage();
        }
    }//fin_all

}//fin clase

echo "<h2>Recuperando registro</h2>";
Login::all();