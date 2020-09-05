<?php
    session_start();
    include 'carrito.php';
    include 'templates/cabecera.php';
   
    
?>

<?php

    $totalPago = 0;
    $SID = session_id();
    $Correo = $_POST['email'];
    $Nombres = $_POST['nombres'];
    $Direccion = $_POST['direccion'];
    $Dni = $_POST['dni'];



    if($_POST){
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $totalPago = $totalPago + ($producto['PRECIO']*$producto['CANTIDAD']);
        }
        

        $conexion = new PDO('mysql:host=localhost; dbname=proyectoidsw','root', '' ); 
        $sentencia = $conexion->prepare("INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`, `Nombres`, `Direccion`, `Dni`)
                                                     VALUES (NULL, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente', :Nombres, :Direccion, :Dni);");
        
        
        $sentencia->bindParam(":ClaveTransaccion", $SID);
        $sentencia->bindParam(":Correo", $Correo);
        $sentencia->bindParam(":Total", $totalPago);
        $sentencia->bindParam(":Nombres", $Nombres);
        $sentencia->bindParam(":Direccion", $Direccion);
        $sentencia->bindParam(":Dni", $Dni);

        $sentencia->execute();

        $idVenta = $conexion->lastInsertId();


        foreach($_SESSION['CARRITO'] as $indice=>$producto){

            //INSERTANDO INFORMACIÓN DE LOS PRODUCTOS A LA TABLA 
            $sentencia = $conexion->prepare("INSERT INTO `tbldetalleventa` 
                                (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
                        VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, '0');");

            $sentencia->bindParam(":IDVENTA", $idVenta);
            $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
            $sentencia->bindParam(":PRECIOUNITARIO", $producto['PRECIO']);
            $sentencia->bindParam(":CANTIDAD", $producto['CANTIDAD']);
        
            $sentencia->execute();
        
        }
        echo $totalPago;
        
    }


?>









<?php   include 'templates/pie.php'; ?>