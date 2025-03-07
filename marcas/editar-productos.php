<?php
    include '../conexion.php';

    if (isset($_POST['producto'])){
        $vproducto = $_POST['producto'];
        $vprecio = $_POST['precio'];
        $vdescripcion = $_POST['descripcion'];
        $viproducto = $_POST['idproducto'];

        $cmd = $db->prepare("UPDATE productos SET nomproducto='$vproducto', preproducto='$vprecio', desproducto='$vdescripcion' WHERE idproducto = '$viproducto'");

        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se actualizo satisfactoriamente";
    }
 ?>