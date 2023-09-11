<?php


require_once 'modelo/MySQL.php';

//capturo los datos obtenidos en variables

$id = $_GET["id"];

//instanciamos la clase,se llama para usar

$mySql = new MySQL();

//se hace uso del metodo para conectarse a la base de datos

$mySql->conectar();


//se guarda en una variable la consulta utilizando el metodo para dicho proceso

$traerDatos = $mySql->efectuarConsulta("SELECT login.usuario.usuario, login.usuario.id, login.usuario.contraseña from login.usuario WHERE login.usuario.id=$id");


$row = mysqli_fetch_array($traerDatos);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="editar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <form action="controlador/actualizar.php" method="post">
        <h1>👋 Welcome!</h1>

        <label class="pure-material-textfield-outlined">
            <input name="id" value="<?php echo $row['id'] ?>" type="hidden">
            <input name="usuarioEditar" value="<?php echo $row['usuario'] ?>" type="text" required>
            <span>Nombre</span>
        </label>

        <label class="pure-material-textfield-outlined">
            <input placeholder=" " name="passwordEditar" value="<?php echo $row['contraseña'] ?>" type="text" required>
            <span>Password</span>
        </label>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>

<?php
