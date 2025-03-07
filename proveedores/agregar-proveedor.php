<?php
    include '../conexion.php';

    if (isset($_POST['nombre'])) {
        $vnombre = $_POST['nombre'];
        $vdireccion = $_POST['direccion'];
        $vemail = $_POST['email'];
        $vtelefono = $_POST['telefono'];
        $cmd = $db->prepare("INSERT INTO proveedores (nombre, direccion, correo_electronico, telefono) 
                             VALUES ('$vnombre','$vdireccion','$vemail','$vtelefono')");
        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Proveedor agregado satisfactoriamente";
    }
?>
