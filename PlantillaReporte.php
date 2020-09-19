<?php
    require 'ReporteComprasPDF/fpdf.php';

    //vamos a heredar los métodos y atributos de la clase FPDF  a la clase PDF

    class PDF extends FPDF
    {
        //PARA EL ENCABEZADO
        function Header(){
            //AGREGAMOS EL LOGO AL ARCHIVO PDF
            $this->Image('imagenes/logoMepo.jpg', 5, 5, 30);
            $this->SetFont('Arial','B',15);
            $this->Cell(20);
            $this->Cell(120,10,'REPORTE DE COMPRAS',0,0,'C');

            $this->Ln(30);

        }

        //PARA EL PIE DE PÁGINA
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,'INTRODUCCION AL DESARROLLO DE SOFTWARE  - GRUPO 06             
                                                     Pagina ', $this->PageNo().'/{nb}',0,0,'C');
        }

    }



?>