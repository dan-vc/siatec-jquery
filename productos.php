<?php
include "auth/validar_sesion.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">

    <title>Siatec Ajax</title>

    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        </script>

    <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
-->

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        -->

</head>

<body>

    <!-- contenedor 1 -->
    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                    <a href="inicio.php" class="navbar-brand">Siatec Perú</a>

                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                        aria-label="Toggle navigation"></button>

                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="proveedores.php">Proveedores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="productos.php">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="categoria.php">Categorias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="marcas.php">Marcas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="clientes.php">Clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="trabajadores.php">Trabajadores</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="navbar-nav ml-auto">

                        <form class="form-inline m-2 my-lg-0">

                            <input type="search" id="search" name="" value="" class="form-control mr-sm-2"
                                placeholder="Busque al proveedor">

                            <button type="submit" name="button" class="btn btn-success my-2 my-sm-0"
                                id="">Buscar</button>

                        </form>

                        <a href="auth/cerrarSesion.php" class="btn btn-danger">Cerrar sesión</a>
                    </ul>

                </nav>

                <script type="text/javascript" src="js/productos.js"></script>

            </div>

        </div>

    </div>

    <!-- contenedor 2 -->
    <div class="container p-4">

        <div class="row">

            <div class="col-md-5">

                <div class="card">

                    <div class="card-body">

                        <form id="productos-form">

                            <input type="hidden" name="" id="idproducto">

                            <div class="form-group">

                                <input type="text" id="producto" placeholder="Nombre Producto" name="producto" value=""
                                    class="form-control">

                            </div>


                            <div class="form-group">
                                <textarea name="descripcion" rows="10" cols="30" id="descripcion" class="form-control"
                                    placeholder="Descripcion de usuario">

                                    </textarea>
                            </div>

                            <div class="form-group">

                                <input type="number" id="precio" placeholder="Precio Producto" name="precio" value=""
                                    class="form-control">

                            </div>

                            <button type="submit" name="button" id="submit"
                                class="btn btn-primary btn-block text-center">
                                Guardar Producto
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="card my-4" id="resultado-productos">

                    <div class="card-body">

                        <ul id="container">

                        </ul>
                    </div>

                </div>

                <table class="table table-bordered table-sm">

                    <thead>

                        <tr>

                            <td>Id</td>

                            <td>Producto</td>

                            <td>Descripcion</td>

                            <td>Precio</td>

                        </tr>
                    </thead>

                    <tbody id="productos-lista"></tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>