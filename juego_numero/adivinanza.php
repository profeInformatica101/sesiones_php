<?php
session_start();

// Verificar si el jugador ha adivinado correctamente o ha superado el límite de intentos
if (isset($_SESSION['ganador']) && $_SESSION['ganador'] || $_SESSION['intentos'] >= 5) {
    header('Location: resultado.php');
    exit;
}

if (isset($_POST['numero'])) {
    $_SESSION['intentos']++;

    if ($_POST['numero'] == $_SESSION['numero_aleatorio']) {
        $_SESSION['ganador'] = true;
        header('Location: resultado.php');
        exit;
    }
}

$nombre_jugador = isset($_COOKIE['nombre_jugador']) ? $_COOKIE['nombre_jugador'] : "Jugador";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivinanza</title>
</head>
<body>
    <h1>Adivina el número, <?= $nombre_jugador ?>!</h1>
    <p>Tienes 5 intentos para adivinar un número entre 1 y 10.</p>
    <p>Intentos realizados: <?= $_SESSION['intentos'] ?></p>
    <form action="adivinanza.php" method="post">
        <input type="number" name="numero" min="1" max="10" required>
        <button type="submit">Adivinar</button>
    </form>
</body>
</html>
