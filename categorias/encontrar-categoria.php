<?php

    include '../conexion.php';
    $id = $_POST['id'];
    if (!empty($id)){
        $cmd = $db->prepare("select * from categoria where idcategoria = $id");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }

        $json = array();
        
        while ($registro = $cmd->fetch()){
            $json[] = array(
                'nomcategoria' => $registro['nomcategoria'],
                'descategoria' => $registro['descategoria'],
                'idcategoria' => $registro['idcategoria']
            );
        }
        $json_string = json_encode($json[0]);
        echo $json_string;
    }

 ?>