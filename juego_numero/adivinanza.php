<?php
session_start();

if (!isset($_COOKIE['nombre_jugador'])) {
    header('Location: nombre_jugador.php');
    exit;
}

if ($_SESSION['ganador'] || $_SESSION['intentos'] >= 5) {
    header('Location: resultado.php');
    exit;
}

$mensaje = "";

if (isset($_POST['numero'])) {
    $_SESSION['intentos']++;

    if ($_POST['numero'] == $_SESSION['numero_aleatorio']) {
        $_SESSION['ganador'] = true;
        $_SESSION['ganadores'][$_COOKIE['nombre_jugador']] = $_SESSION['intentos'];
        header('Location: resultado.php');
        exit;
    } elseif ($_POST['numero'] < $_SESSION['numero_aleatorio']) {
        $mensaje = "El número que ingresaste es más pequeño.";
    } else {
        $mensaje = "El número que ingresaste es más grande.";
    }
}

$nombre_jugador = $_COOKIE['nombre_jugador'];
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
    
    <?php if (!empty($mensaje)): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
    
    <form action="adivinanza.php" method="post">
        <input type="number" name="numero" min="1" max="10" required>
        <button type="submit">Adivinar</button>
    </form>
</body>
</html>
