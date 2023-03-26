<?php
session_start();

$tiempo_actual = time();
$tiempo_inicio = $_SESSION['tiempo_inicio'] ?? 0;
$tiempo_limite = 60; // 60 segundos, es decir, 1 minuto

if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado'] || ($tiempo_actual - $tiempo_inicio) > $tiempo_limite) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área privada</title>
</head>
<body>
    <h1>¡Bienvenido al área privada!</h1>
    <p>Aquí está el contenido protegido por contraseña.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
