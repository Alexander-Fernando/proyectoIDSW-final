<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--PARA CARGAR LAS FUENTES ESPECIALES--->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a0b9330667.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <title>Registrate</title>
</head>
<body>
    <div class="contenedor">

        <h1 class="titulo">Registrate</h1>
        <hr class="border">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fas fa-user-tie"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario IDSW">
            </div>

            <div class="form-group">
                <i class="icono izquierda fas fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña IDSW">
            </div>

            <div class="form-group">
                <i class="icono izquierda fas fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir contraseña">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>

            <!--MOTRANDO EN CASO EXISTA UN ERROR AL LLENAR LOS CAMPOS-->
            <?php if(!empty($errores)):?>
                <div>
                    <ul>
                        <div class="alert alert-danger alerta" role="alert">
                             <strong><?php echo $errores; ?></strong>
                        </div>
                    </ul>
                </div>
            <?php endif;?> 
        </form>

        <p class="texto-registrate">
            ¿ Ya tienes una cuenta ?
            <a href="login.php">Iniciar Sesion</a>
        </p>
    </div>
    
    <footer class="footer">EQUIPO 06 - INTRODUCCIÓN AL DESARROLLO DE SOFTWARE - derechos reservados ®</footer>
</body>
</html>