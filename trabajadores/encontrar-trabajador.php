<?php

include '../conexion.php';
$id = $_POST['id'];
if (!empty($id)) {
    $cmd = $db->prepare("SELECT * FROM trabajadores WHERE id = $id");
    $cmd->execute();
    if (!$cmd) {
        die('Error de consulta ');
    }

    $json = array();

    while ($registro = $cmd->fetch()) {
        $json[] = array(
            'nombre' => $registro['nombre'],
            'direccion' => $registro['direccion'],
            'correo_electronico' => $registro['correo_electronico'],
            'telefono' => $registro['telefono'],
            'id' => $registro['id'],
        );
    }
    $json_string = json_encode($json[0]);
    echo $json_string;
}
