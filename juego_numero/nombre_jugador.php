<?php
if (isset($_POST['nombre'])) {
    $nombre_jugador = $_POST['nombre'];
    setcookie('nombre_jugador', $nombre_jugador, time() + 86400 * 30); // La cookie expira en 30 días
    header('Location: adivinanza.php');
    exit;
}

$nombre_jugador = isset($_COOKIE['nombre_jugador']) ? $_COOKIE['nombre_jugador'] : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nombre del jugador</title>
</head>
<body>
    <h1>Ingresa o edita tu nombre</h1>
    <form action="nombre_jugador.php" method="post">
        <input type="text" name="nombre" value="<?= $nombre_jugador ?>" required>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
