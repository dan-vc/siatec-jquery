<?php

    include '../conexion.php';
    $buscar = $_POST['search'];
    if (!empty($buscar)){
        $cmd = $db->prepare("SELECT * FROM marcas where nombre like '$buscar%'");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }
        $json = array();
        while ($registro = $cmd->fetch()){
            $json[] = array(
                'id' => $registro['id'],
                'nombre' => $registro['nombre'],
                'descripcion' => $registro['descripcion'],
            );
		}
        $json_string = json_encode($json);
        echo $json_string;
    }

 ?>
