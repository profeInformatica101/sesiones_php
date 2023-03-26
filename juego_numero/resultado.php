<?php
session_start();

if (!isset($_SESSION['ganador']) && $_SESSION['intentos'] < 5) {
    header('Location: adivinanza.php');
    exit;
}

$mensaje = $_SESSION['ganador'] ? '¡Felicidades! ¡Adivinaste el número!' : 'Lo siento, no adivinaste el número.';

if ($_SESSION['ganador']) {
    $nombre_jugador = $_COOKIE['nombre_jugador'];
    $ganadores = isset($_SESSION['ganadores']) ? $_SESSION['ganadores'] : [];
    $ganadores[] = ['nombre' => $nombre_jugador, 'intentos' => $_SESSION['intentos']];
    $_SESSION['ganadores'] = $ganadores;
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1><?= $mensaje ?></h1>
    <a href="index.php">Jugar de nuevo</a> | <a href="nombre_jugador.php">Editar nombre</a>
</body>
</html>
