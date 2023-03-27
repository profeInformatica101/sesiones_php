<?php
session_start();

var_dump($_SESSION);

if (isset($_SESSION['oportunidades'] > 0)) {
   echo "Test";
}else{
    session_destroy();
    header('Location: index.php');
    exit;
}

