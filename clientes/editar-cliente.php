<?php
    include '../conexion.php';

    if (isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $id = $_POST['clienteId'];

        $cmd = $db->prepare("UPDATE clientes SET nombre='$nombre', direccion='$direccion', correo_electronico='$email', telefono='$telefono' WHERE id = '$id'");

        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se actualizo satisfactoriamente";
    }
 ?>