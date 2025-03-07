<?php
session_start();

include '../conexion.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Preparar y ejecutar la consulta
    $stmt = $db->prepare("SELECT clave FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam("usuario", $usuario);
    $stmt->execute();

    // Verificar si el usuario existe
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();

        // Verificar la contraseña
        if ($clave === $row["clave"]) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['usuario'] = $usuario;
            header("Location: ../inicio.php"); // Redirigir a la página de inicio
            exit();
        } else {
            echo "Contraseña incorrecta.";
            header("Location: ../index.php"); // volver
            exit();
        }
    } else {
        echo "Usuario no encontrado.";
        header("Location: ../index.php"); // volver
        exit();
    }

}

?>