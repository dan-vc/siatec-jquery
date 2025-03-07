<?php
    include '../conexion.php';

    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $cmd = $db->prepare("INSERT INTO trabajadores (nombre, direccion, correo_electronico, telefono) 
                             VALUES ('$nombre','$direccion','$email','$telefono')");
        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Cliente agregado satisfactoriamente";
    }
?>
