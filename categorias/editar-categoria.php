<?php
    include '../conexion.php';

    if (isset($_POST['nomcategoria'])){
        $vnomcategoria = $_POST['nomcategoria'];
        $vdescategoria = $_POST['descategoria'];
        $vidcategoria = $_POST['idcategoria'];

        $cmd = $db->prepare("UPDATE categoria SET nomcategoria='$vnomcategoria', descategoria='$vdescategoria' WHERE idcategoria = '$vidcategoria'");

        $cmd->execute();

        if(!$cmd){
            die('Error de consulta ');
        }
        echo "Se actualizo satisfactoriamente";
    }
 ?>