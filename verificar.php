<?php
session_start();

// Establecer una contraseña predefinida
$contrasenia_correcta = "mi_contraseña_segura";

// Verificar si el usuario proporcionó una contraseña
if (isset($_POST['password'])) {
    $contrasenia_proporcionada = $_POST['password'];

    // Si no hay intentos registrados, inicializar el contador
    if (!isset($_SESSION['intentos_fallidos'])) {
        $_SESSION['intentos_fallidos'] = 0;
    }

    // Comprobar si la contraseña proporcionada es correcta
    if ($contrasenia_proporcionada === $contrasenia_correcta && $_SESSION['intentos_fallidos'] < 3) {
        $_SESSION['autenticado'] = true;
        $_SESSION['tiempo_inicio'] = time();
        header('Location: area_privada.php');
        exit;
    } else {
        $_SESSION['autenticado'] = false;
        $_SESSION['intentos_fallidos']++;
        
        if ($_SESSION['intentos_fallidos'] >= 3) {
            header('Location: login.php?error=2');
        } else {
            header('Location: login.php?error=1');
        }
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
