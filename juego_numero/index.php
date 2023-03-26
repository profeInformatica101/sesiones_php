<?php
if (!isset($_COOKIE['nombre_jugador'])) {
    header('Location: nombre_jugador.php');
    exit;
}

header('Location: adivinanza.php');
exit;
