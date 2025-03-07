<?php
include '../conexion.php';

$cmd = $db->prepare("SELECT * FROM clientes");
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
        'id'=> $registro['id'],
    );
}
$json_string = json_encode($json);
echo $json_string;
