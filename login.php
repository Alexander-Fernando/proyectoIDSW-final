<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header('Location: index.php');
    }

    $errores = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];

        $password = hash('sha512', $password);
        
        try{

            $conexion =  new PDO('mysql:host=localhost;dbname=proyectoidsw', 'root', '');

        }catch(PDOException $e){

            echo "Error: " . $e->getMessage(); 

        }

        $peticion = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :contra');
        $peticion->execute(array(':usuario' => $usuario, ':contra' => $password));

        $resultadoPeticion = $peticion->fetch();


        
        if($resultadoPeticion !== false){
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
        } else{
            $errores .= '<li> DATOS INCORRECTOS </li>';
        }
    }


    require 'views/login.view.php';
?>