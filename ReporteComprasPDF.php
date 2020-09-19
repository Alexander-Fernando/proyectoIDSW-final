<?php
    session_start();
    include 'carrito.php';

    include 'PlantillaReporte.php';

    //REALIZAMOS LA CONEXION A NUESTRA BASE DE DATOS;
    /*
    try{
        $conexion =  new PDO('mysql:host=localhost;dbname=proyectoidsw', 'root', '');

    }catch(PDOException $e){
        echo "Error: " . $e->getMessage(); 
    }
    */

    //REALIZAMOS LA CONSULTA



    $pdf = new PDF();

    //PARA OBTENER EL NÚMERO DE PÁGINAS
    $pdf->AliasNbPages();

    //AGREGAMOS UNA NEUVA PÁGINA
    $pdf->AddPage();

    $pdf->SetFillColor(232,232,232);
    //ESTABLECEMOS LA FUENTE DEL PDF
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(60, 6, 'PRODUCTO', 1, 0, 'C', 1);
    $pdf->Cell(60, 6, 'CANTIDAD', 1, 0, 'C', 1);
    $pdf->Cell(60, 6, 'PRECIO UNITARIO', 1, 1, 'C', 1);



    $pdf->SetFont('Arial', '', 10);
    if(!empty($_SESSION['CARRITO'])){
       
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $pdf->Cell(60, 6, utf8_decode($producto['NOMBRE']), 1, 0, 'C', 1);
            $pdf->Cell(60, 6, $producto['CANTIDAD'], 1, 0, 'C', 1);
            $pdf->Cell(60, 6, $producto['PRECIO'], 1, 1, 'C', 1);


        }
    }


    //ENVIAMOS EL RESULTADO 
    $pdf->Output();

?>