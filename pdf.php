<?php
require('fpdf/fpdf.php');

    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $width_cell=array(10,30,20,30);

    $pdf->SetFillColor(193,229,252);
    $pdf->Cell($width_cell[0],10,'ID',1,0,true);
    $pdf->Cell($width_cell[1],10,'NAME',1,0,true); 
    $pdf->Cell($width_cell[2],10,'CLASS',1,0,true);
    $pdf->Cell($width_cell[3],10,'MARK',1,1,true);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell($width_cell[0],10,'1',1,0,false); 
    $pdf->Cell($width_cell[1],10,'John Deo',1,0,false);
    $pdf->Cell($width_cell[2],10,'Four',1,0,false);
    $pdf->Cell($width_cell[3],10,'75',1,1,false);
    $pdf->Output("exported.pdf","F");
