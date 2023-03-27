<?php
session_start();

if (!isset($_SESSION['oportunidades'])) {
    $_SESSION['oportunidades'] = 4;
    $_SESSION['password'] = '1234';
}


header('Location: juego.php');
exit;
