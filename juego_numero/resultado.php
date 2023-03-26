<?php
session_start();

if (!isset($_SESSION['ganador']) && $_SESSION['intentos'] < 5) {
    header('Location: adivinanza.php');
    exit;
}

$mensaje = $_SESSION['ganador'] ? '¡Felicidades! ¡Adivinaste el número!' : 'Lo siento, no adivinaste el número.';

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
    <p>Tu puntaje actual: <?= $_COOKIE['puntaje'] ?></p>
    <a href="index.php">Jugar de nuevo</a>
</body>
