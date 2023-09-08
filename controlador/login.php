<?php
//controla el inicio de sesion

if (
    isset($_POST["usuario"]) && !empty($_POST["usuario"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])
) {

    //se hace el llamado del modelo de conexion y consulta

    require_once '../modelo/MySQL.php';


    //capturo los datos obtenidos en variables

    $usuario = $_POST["usuario"];
    $password = md5($_POST["password"]);


    //instanciamos la clase,se llama para usar

    $mySql = new MySQL();

    //se hace uso del metodo para conectarse a la base de datos

    $mySql->conectar();

    //se guarda en una variable la consulta utilizando el metodo para dicho proceso

    $usuario = $mySql->efectuarConsulta("SELECT login.usuario.usuario,login.usuario.contraseña FROM login.usuario WHERE login.usuario.usuario='" . $usuario . "' && login.usuario.contraseña = '" . $password . "'");

    //desconecto de la base de datos para liberar memoria

    $mySql->desconectar();

    //capturo los datos de la consulta , en una sola fila

    $fila = mysqli_fetch_assoc($usuario);


    //se cuentan las filas de la consulta, por cada usuario que coincida es una fila

    //si la consulta arroja 1 fila y es mayor a 0 es que existe un usuario

    if (mysqli_num_rows($usuario) > 0) {
        header("Location:../dashboard.php");
    } else {
        header("Location:../index.php");
    }
}
