<?php

include '../conexion.php';
    $id = $_POST['id'];
    if (!empty($id)){
        $cmd = $db->prepare("select * from marcas where id = $id");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }

        $json = array();
        
        while ($registro = $cmd->fetch()){
            $json[] = array(
                'nombre' => $registro['nombre'],
                'descripcion' => $registro['descripcion'],
                'id' => $registro['id']
            );
        }
        $json_string = json_encode($json[0]);
        echo $json_string;
    }

 ?>