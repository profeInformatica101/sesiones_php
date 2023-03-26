<?php
session_start();

// Generar un número aleatorio y guardar en la sesión
$_SESSION['numero_aleatorio'] = rand(1, 10);
$_SESSION['intentos'] = 0;

// Inicializar el puntaje del jugador usando una cookie
if (!isset($_COOKIE['puntaje'])) {
    setcookie('puntaje', 0, time() + 86400 * 30); // La cookie expira en 30 días
}

header('Location: adivinanza.php');
exit;
