<?php

    include '../conexion.php';
    $buscar = $_POST['search'];
    if (!empty($buscar)){
        $cmd = $db->prepare("select * from categoria where nomcategoria like '$buscar%'");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }
        $json = array();
        while ($registro = $cmd->fetch()){
            $json[] = array(
                'nomcategoria' => $registro['nomcategoria'],
                'descripcion' => $registro['descategoria'],
                'idusuario' => $registro['idcategoria']
            );
		}
        $json_string = json_encode($json);
        echo $json_string;
    }

 ?>
