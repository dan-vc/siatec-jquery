<?php
session_start();

// Verificar si el usuario NO está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirige a la página de login si no está autenticado
    exit();
}
?>
