<?php
session_start();

if (!$_SESSION['ganador'] && $_SESSION['intentos'] < 5) {
    header('Location: adivinanza.php');
    exit;
}

$mensaje = $_SESSION['ganador'] ? '¡Felicidades! Adivinaste el número.' : 'Lo siento, no adivinaste el número.';
$nombre_jugador = $_COOKIE['nombre_jugador'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1><?= $mensaje ?></h1>
    <p>Jugador: <?= $nombre_jugador ?></p>
    <p>Intentos realizados: <?= $_SESSION['intentos'] ?></p>
    
    <h2>Ganadores</h2>
    <ul>
        <?php foreach ($_SESSION['ganadores'] as $jugador => $intentos): ?>
            <li><?= $jugador ?> - <?= $intentos ?> intento(s)</li>
        <?php endforeach; ?>
    </ul>
    
    <a href="index.php">Jugar de nuevo</a>
</body>
</html>
