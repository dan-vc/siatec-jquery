<?php
	include '../conexion.php';

    $cmd = $db->prepare("SELECT * FROM marcas");
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
    $json_string = json_encode($json);
    echo $json_string;    
?>