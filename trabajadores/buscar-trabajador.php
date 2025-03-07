<?php

    include '../conexion.php';
    $buscar = $_POST['search'];
    if (!empty($buscar)){
        $cmd = $db->prepare("SELECT * FROM trabajadores WHERE nombre like '$buscar%'");
        $cmd->execute();
        if(!$cmd){
            die('Error de consulta ');
        }
        $json = array();
        while ($registro = $cmd->fetch()){
            $json[] = array(
                'nombre' => $registro['nombre'],
                'direccion' => $registro['direccion'],
                'correo_electronico' => $registro['correo_electronico'],
                'telefono' => $registro['telefono'],
                'id'=> $registro['id'],
            );
		}
        $json_string = json_encode($json);
        echo $json_string;
    }

 ?>
