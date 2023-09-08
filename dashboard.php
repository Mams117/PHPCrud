<?php
require_once 'modelo/MySQL.php';

$MySql = new MySQL();
$MySql->conectar();
$consulta = $MySql->efectuarConsulta("SELECT login.usuario.id,login.usuario.usuario,login.usuario.contraseña FROM login.usuario");
$MySql->desconectar();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="link2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>card</title>
</head>

<body>




    <div class="container-fluid">
        <div class="row">
            <div class="col-6">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($consulta)) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['id'] ?>
                                </td>
                                <td>
                                    <?php echo $row['usuario'] ?>
                                </td>
                                <td>
                                    <?php echo $row['contraseña'] ?>
                                </td>

                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-6"></div>
        </div>
    </div>













    <!-- <div id="contenedor">
        <div id="contenedorcentrado">
            <div class="card" style="width: 18rem;">
                <img src="./yujiro.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bienvenido</h5>
                    <p class="card-text">Usuario existe HP.</p>
                    <a href="index.php" class="btn btn-primary">Ir al inicio</a>
                </div>
            </div>
        </div>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>