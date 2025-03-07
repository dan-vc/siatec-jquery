<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siatec Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <form action="auth/validar.php" method="POST">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <h3 class="text-center">Iniciar Sesión</h3>

                        <div class="form-group">
                            <label for="usuario">Usuario:</label><br>
                            <input type="text" name="usuario" id="usuario" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="clave">Contraseña:</label><br>
                            <input type="password" name="clave" id="clave" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Acceder">
                        </div>

                    </div>
                </div>
            </div>
    </form>
</body>

</html>