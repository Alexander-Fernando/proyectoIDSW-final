<?php

    session_start();
    //ARCHIVO CON LA LÓGICA DEL REGISTRO

    if(isset($_SESSION['usuario'])){
        header('Location: index.php');
    }

    //VERIFICA QUE LOS DATOS SE ENVIARON CORRECTAMENTE MEDIANTE EL MÉTODO POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING); //PARA FILTRAR LOS CARACTERES ESPECIALES
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        
        //verificar que se están enviando los datos correctamente
        //echo "$usuario . $password . $password2";

        $errores = '';

        //VERIFICA QUE LOS CAMPOS SE ENCUENTREN VACÍOS
        if(empty($usuario) or empty("$password") or empty("$password2")){
            $errores .= '<li>Campo vacío. Rellena los campos correctamente!</li>';
        }
        //comprobando que el usuario noe exista en nuestra base de datos
        else{
            try{
                //Establecemos nuestra conexión a la base de datos
                $conexion = new PDO('mysql:host=localhost; dbname=proyectoidsw','root', '' ); 
            }catch(PDOExcepttion $e){
                echo 'Error: '. $e.getMessage();
            }
            
            //REALIZANDO Y EJECUTANDO LA PETICIÓN A LA BASE DE DATOS
            $peticion = $conexion->prepare('SELECT * FROM usuarios WHERE usuario= :usuario LIMIT 1');
            $peticion->execute(array(':usuario'=> $usuario));
            $resultadoPeticion = $peticion->fetch(); //devuelve un booleano

            if($resultadoPeticion != false){
                $errores .= '<li>El nombre de usuario ya existe. Digite otro usuario </li>';
            }

            //"ENCRIPTANDO" A TRAVÉS DEL ALGORITMO HASH 512 LA CONTRASEÑA PARA MAYOR SEGURIDAD
            $password = hash('sha512', $password);
            $password2 = hash('sha512', $password2);

            //vrificamos que la contraseña ha sido encriptada con el algoritmo sha512
            //echo "Datos ingresados  . $password . $password2";

            if($password != $password2){
                $errores .= '<li>Las contraseñas no son iguales. Digite la contraseñas nuevamente</li>';
            }
        }



        if($errores == ''){

            //REALIZAMOS LA PETICIÓN PARA AGREGAR A LA BASE DE DATOS LOS DATOS DIGITADOS POR EL USUARIO
            $peticion2 = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (NULL, :usuario, :pass)'); 
            $peticion2->execute(array(':usuario' => $usuario, ':pass' => $password));

            //Envíamos al usuario a la interfaz del login para que pueda acceder
            header('Location: login.php');
        }
    }

    //LLAMA AL ARCHIVO CON EL FRONTEND
    require 'views/registrate.view.php';

?>