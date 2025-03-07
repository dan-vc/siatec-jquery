<?php
    include '../conexion.php';

    if (isset($_POST['nomcategoria'])){
        $vnomcategoria = $_POST['nomcategoria'];
        $vdescategoria = $_POST['descategoria'];
        $cmd = $db->prepare("insert into categoria  (nomcategoria, descategoria) values ('$vnomcategoria','$vdescategoria')");
        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se agrego satisfactoriamente";
    }
 ?>
