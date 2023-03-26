<?php
session_start();

if (!isset($_SESSION['ganadores'])) {
    $_SESSION['ganadores'] = [];
}

$_SESSION['numero_aleatorio'] = rand(1, 10);
$_SESSION['intentos'] = 0;
$_SESSION['ganador'] = false;

header('Location: nombre_jugador.php');
exit;
