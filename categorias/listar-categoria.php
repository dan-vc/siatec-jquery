<?php
	include '../conexion.php';

    $cmd = $db->prepare("select idcategoria,nomcategoria,descategoria from categoria");
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
    $json_string = json_encode($json);
    echo $json_string;    
?>