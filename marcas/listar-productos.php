<?php
	include '../conexion.php';

    $cmd = $db->prepare("select idproducto,nomproducto,desproducto,preproducto from productos");
    $cmd->execute();

    if(!$cmd){
    	die('Error de consulta ');
    }
    $json = array();
    while ($registro = $cmd->fetch()){
        $json[] = array(
            'producto' => $registro['nomproducto'],
            'descripcion' => $registro['desproducto'],
            'precio' => $registro['preproducto'],
            'idproducto' => $registro['idproducto']
        );
	}
    $json_string = json_encode($json);
    echo $json_string;    
?>