<?php
    session_start();

    //cerrar la sesión
    session_destroy();    

    $_SESSION = array();

    header('Location: login.php');
    die();
?>