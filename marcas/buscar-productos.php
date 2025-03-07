<?php

    include '../conexion.php';
    $buscar = $_POST['search'];
    if (!empty($buscar)){
        $cmd = $db->prepare("select * from productos where nomproducto like '$buscar%'");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }
        $json = array();
        while ($registro = $cmd->fetch()){
            $json[] = array(
                'idproducto' => $registro['idproducto'],
                'producto' => $registro['nomproducto'],
                'descripcion' => $registro['desproducto'],
                'precio' => $registro['preproducto'],
            );
		}
        $json_string = json_encode($json);
        echo $json_string;
    }

 ?>
