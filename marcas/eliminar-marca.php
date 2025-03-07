<?php

include '../conexion.php';
    
    $id = $_POST['id'];

    if (!empty($id)) {
        $cmd = $db->prepare("DELETE FROM marcas WHERE id = :id");
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta');
        }
        echo "Tarea completada";
    }
?>
