<?php
session_start();

if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado']) {
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
