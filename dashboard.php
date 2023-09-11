<?php
require_once 'modelo/MySQL.php';

$MySql = new MySQL();
$MySql->conectar();
$consulta = $MySql->efectuarConsulta("SELECT login.usuario.id, login.usuario.usuario,login.usuario.contraseña FROM login.usuario");
$MySql->desconectar();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="link2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
                                    <a class="btn btn-success" href="./editar.php?id=<?php echo $row["id"] ?>">Editar</a>

                                </td>

                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <form action="controlador/registro.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre </label>
                        <input type="text" class="form-control" name="nombreRegistro">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="passwordRegistro">
                    </div>
                    <button type="submit" name="enviar">Enviar</button>
                </form>
            </div>
            <div class="col-5">
                <div class="modal fade" id="modaleditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Informacion</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <script>
                                    let botones = document.querySelectorAll('[data-target="#modaleditar"]');
                                    botones.forEach((btn) => {
                                        btn.addEventListener("click", function() {
                                            // Obtener columnas desde TR padre:
                                            let tds = this.closest("tr").querySelectorAll("td");
                                            // Obtener ID desde el botón
                                            let id = this.dataset.id;
                                            // Obtener datos por contenido de TD:
                                            let nombre = tds[1].innerText;
                                            let password = tds[2].innerText;
                                            // Asignar datos a ventana modal:
                                            document.querySelector("#id").value = id;
                                            document.querySelector("#usuarioEditar").value = nombre;
                                            document.querySelector("#passwordEditar").value = password;
                                            console.log("abrir modal");
                                            $("#modaleditar").modal();
                                        });
                                    });

                                    $('.openBtn2').on('click', function() {
                                        var valor = $(this).data("id");
                                        $('.modal-body').load('../es/pagina.php?v=' + valor, function() {
                                            $('#myModal').modal({
                                                show: true
                                            });
                                        });
                                    });
                                </script>

                                <form action="controlador/actualizar.php" method="put">
                                    <div class="col-5">
                                        <label for="id">ID</label>
                                        <input type="text" name="id" id="id" required <?php $id = ['id']; ?>>
                                        <br>
                                        <br>

                                        <label for="usuario">Usuario</label>
                                        <input type="text" id="usuarioEditar" name="usuarioEditar" required>
                                        <br>
                                        <br>

                                        <label for="password">Contraseña</label>
                                        <input type="password" id="passwordEditar" name="passwordEditar" required>
                                        <br>
                                        <br>
                                        <button type="button" class="btn btn-success" name="ingresar">Actualizar</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



</body>

</html>