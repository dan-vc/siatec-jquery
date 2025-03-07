<?php

include '../conexion.php';
    $id = $_POST['id'];
    if (!empty($id)){
        $cmd = $db->prepare("select * from productos where idproducto = $id");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }

        $json = array();
        
        while ($registro = $cmd->fetch()){
            $json[] = array(
                'producto' => $registro['nomproducto'],
                'precio' => $registro['preproducto'],
                'descripcion' => $registro['desproducto'],
                'idproducto' => $registro['idproducto']
            );
        }
        $json_string = json_encode($json[0]);
        echo $json_string;
    }

 ?>