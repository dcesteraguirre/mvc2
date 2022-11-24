<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>FORMULARIO PARA INTRODUCIR UNA PERSONA EN LA BASE DE DATOS</h1>
<form name ="formularioContactoPersona" action="auth.php" method="POST">
    <p>
        <label for="usuario">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
    </p>
    <p>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" id="apellidos">
    </p> 
    <p>
        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion">
    </p>
    <p>
        <label for="telefono">Teléfono: </label>
        <input type="text" name="telefono" id="telefono">
    </p>
</body>
</html>