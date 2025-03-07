<?php
    include '../conexion.php';

    if (isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cmd = $db->prepare("INSERT INTO marcas(nombre, descripcion) values ('$nombre','$descripcion')");
        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se agrego satisfactoriamente";
    }
 ?>
