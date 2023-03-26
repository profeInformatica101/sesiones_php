<?php
session_start();

if (!$_SESSION['ganador'] && $_SESSION['intentos'] < 5) {
    header('Location: adivinanza.php');
    exit;
}

$mensaje = $_SESSION['ganador'] ? '¡
