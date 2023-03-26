<?php
session_start();

// Establecer una contraseña predefinida
$contrasenia_correcta = "mi_contraseña_segura";

// Verificar si el usuario proporcionó una contraseña
if (isset($_POST['password'])) {
    $contrasenia_proporcionada = $_POST['password'];
    
    // Comprobar si la contraseña proporcionada es correcta
    if ($contrasenia_proporcionada === $contrasenia_correcta) {
        $_SESSION['autenticado'] = true;
        header('Location: area_privada.php');
        exit;
    } else {
        $_SESSION['autenticado'] = false;
        header('Location: login.php?error=1');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
