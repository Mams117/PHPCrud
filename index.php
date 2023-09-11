<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <link rel="stylesheet" href="link.css">
    <title>Login</title>
</head>

<div class="container-fluid">
    <div class="row">
        <div class="col-5">

            <div id="contenedor">

                <div id="contenedorcentrado">
                    <div id="login">
                        <form action="controlador/login.php" method="post">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" placeholder="Usuario" required>

                            <label for="password">Contraseña</label>
                            <input type="password" placeholder="Contraseña" name="password" required>

                            <button type="submit" title="Ingresar" name="Ingresar">Ingresar</button>
                        </form>

                    </div>
                    <div id="derecho">
                        <div class="titulo">
                            Bienvenido
                        </div>
                        <hr>
                        <div class="pie-form">
                            <a href="#">¿Perdiste tu contraseña?</a>
                            <a href="#">¿No tienes Cuenta? Registrate</a>
                            <hr>
                            <a href="#">« Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>