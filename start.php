<?php
echo 'Contenido Privado<br>';
     $dsn = "mysql:dbname=agenda;host=db";
     $usuario = "root";
     $clave = "password";
     
     try {
        $bd = new PDO($dsn,$usuario,$clave);
        $sql = "select usuario,password from credenciales";
        $registros = $bd->query($sql);
        echo "<br>Numero de registros devueltos: " . $registros->rowCount();
        if($registros->rowCount() > 0){
            foreach($registros as $fila){
                echo "<br>Usuario :  " .$fila[0];
                echo "<br>Contraseña :  " .$fila[1];
            }
        }else{
            echo "<br>No se ha devuelto ninguna fila";
        }

    } catch (PDOException $e){
        echo "<br>Mensaje de la excepcion : " . $e->getMessage();
    }
    /*
    while($filas = mysqli_fetch_assoc($resultados)){
        ?>
            <tr>
                <td><?php echo $filas['nombre']?></td>
                <td><?php echo $filas['apellidos']?></td>
                <td><?php echo $filas['direccion']?></td>
                <td><?php echo $filas['telefono']?></td>
                <td><?php echo $filas['email']?></td>
            </tr>
        <?php
        }*/