<?php
    include '../conexion.php';

    if (isset($_POST['producto'])){
        $vproducto = $_POST['producto'];
        $vprecio = $_POST['precio'];
        $vdescripcion = $_POST['descripcion'];
        $cmd = $db->prepare("insert into productos(nomproducto,preproducto, desproducto) values ('$vproducto','$vprecio','$vdescripcion')");
        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se agrego satisfactoriamente";
    }
 ?>
