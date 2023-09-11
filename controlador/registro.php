<?php
//se hace el llamado del modelo de conexion y consulta

require_once '../modelo/MySQL.php';


if (
    isset($_POST["nombreRegistro"]) && !empty($_POST["nombreRegistro"]) &&
    isset($_POST["passwordRegistro"]) && !empty($_POST["passwordRegistro"])
)


    //capturo los datos obtenidos en variables

$usuario = $_POST["nombreRegistro"];
$password = md5($_POST["passwordRegistro"]);

//instanciamos la clase,se llama para usar

$mySql = new MySQL();

//se hace uso del metodo para conectarse a la base de datos

$mySql->conectar();


//se guarda en una variable la consulta utilizando el metodo para dicho proceso

$usuario = $mySql->efectuarConsulta("INSERT INTO login.usuario (login.usuario.usuario,login.usuario.contraseña) VALUES ('" . $usuario . "','" . $password . "')");

//desconecto de la base de datos para liberar memoria

$mySql->desconectar();


//si la consulta arroja 1 fila y es mayor a 0 es que existe un usuario

header("Location:../dashboard.php");
