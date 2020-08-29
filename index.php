<?php

session_start();

//VERIFICAMOS QUE EL USUARIO HAYA INICIADO SESIÓN
if(isset($_SESSION['usuario'])){
    header('Location: contenido.php');
}
else{
    header('Location: registrate.php');
}






?>