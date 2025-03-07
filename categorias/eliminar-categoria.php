<?php

    include '../conexion.php';
    $id = $_POST['id'];
    if (!empty($id)){
        $cmd = $db->prepare("delete from categoria where idcategoria = $id");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }
        
        echo "Tarea completada";
    }

 ?>