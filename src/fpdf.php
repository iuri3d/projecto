<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    $pdf = new FPDF('p', 'cm', 'A4');

    $pdf->AddPage();

    $pdf->SetFont('Arial', '', 12);
    
    ///Cell parameteres - width - height - text - border 0/1 - next line 0->right 1->nextline - align LCR
    $pdf->cell(3, 3, "Nome", 0, 0, 'C');
    $pdf->cell(3, 3, "Produto", 0, 0, 'C');
    $pdf->cell(3, 3, "Qtd.", 0, 0, 'C');
    $pdf->cell(3, 3, "Preço", 0, 0, 'C');
    $pdf->cell(3, 3, "Total", 0, 1, 'C');
    $pdf->cell(3, 3, "Bolacha Maria", 0, 0, 'C');

    $pdf->OutPut();
?>