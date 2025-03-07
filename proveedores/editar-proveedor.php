<?php
    include '../conexion.php';

    if (isset($_POST['nombre'])){
        $vnombre = $_POST['nombre'];
        $vdireccion = $_POST['direccion'];
        $vemail = $_POST['email'];
        $vtelefono = $_POST['telefono'];
        $vid = $_POST['proveedorId'];

        $cmd = $db->prepare("UPDATE proveedores SET nombre='$vnombre', direccion='$vdireccion', correo_electronico='$vemail', telefono='$vtelefono' WHERE id = '$vid'");

        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se actualizo satisfactoriamente";
    }
 ?>