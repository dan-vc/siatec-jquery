<?php
    include '../conexion.php';

    if (isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $marcaId = $_POST['marcaId'];

        $cmd = $db->prepare("UPDATE marcas SET nombre='$nombre', descripcion='$descripcion' WHERE id = '$marcaId'");

        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se actualizo satisfactoriamente";
    }
 ?>