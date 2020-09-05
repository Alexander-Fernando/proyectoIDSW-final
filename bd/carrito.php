<?php

    $mensaje='';

    //validaciones
    
    if(isset($_POST['btnAccion'])){

        switch($_POST['btnAccion']){
            case 'Agregar': 


                //validando el ID
                if(is_numeric($_POST['id'])){
                    $ID = $_POST['id'];
                    $mensaje .= "OK id correcto...".$ID.'<br>';
                }else{
                    $mensaje .= "ID NO VÁLIDO".$ID.'<br>';
                    break;
                }

                //validando el nombre
                if(is_string($_POST['nombre'])){
                    $NOMBRE = $_POST['nombre'];
                    $mensaje .= "OK NOMBRE correcto...".$NOMBRE.'<br>';
                }else{
                    $mensaje .= "NOMBRE NO VÁLIDO...".$NOMBRE.'<br>';
                    break;
                }

                //validando la cantidad
                if(is_numeric($_POST['cantidad'])){
                    $CANTIDAD = $_POST['cantidad'];
                    $mensaje .= "OK CANTIDAD correcto...".$CANTIDAD.'<br>';
                }else{
                    $mensaje .= "CANTIDAD NO VALIDA...".$CANTIDAD.'<br>';
                 break;
                }

                //validando el precio
                if(is_numeric($_POST['precio'])){
                    $PRECIO = $_POST['precio'];
                    $mensaje .= "OK PRECIO correcto...".$PRECIO.'<br>';
                }else{
                    $mensaje .="PRECIO NO VALIDO....".$PRECIO.'<br>';
                    break;
                }


                //INFORMACIÓN DE TODOS LOS PRPODUCTOS SELECCIONADOS POR EL USUARIO
                if(!isset($_SESSION['CARRITO'])){
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO
                    );
                    $_SESSION['CARRITO'][0] = $producto;

                    $mensaje = "Producto agregado al carrito.....";
                }else{
                    $NumeroProductos = count($_SESSION['CARRITO']); 
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO
                    );
                     
                    array_push($_SESSION['CARRITO'], $producto);
                    //$_SESSION['CARRITO'][$NumeroProductos] = $producto;
                    $mensaje = "Producto agregado al carrito.....";
                }

                //$mensaje = print_r($_SESSION['CARRITO'], true);
                $mensaje = "Producto agregado al carrito.....";


            break;
            
            case 'Eliminar':
                if(is_numeric($_POST['id'])){
                    $ID = $_POST['id'];

                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID'] === $ID){
                            unset($_SESSION['CARRITO'][$indice]); 
                        }

                    }
                }
                
            break;
        }


    }
?>