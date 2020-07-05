<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

    class PDF extends FPDF
{
    function Header(){
        // Select Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Framed title
        $this->Cell(30,10,'Super App',1,0,'C');
        // Line break
        $this->Ln(20);
    }

    function Footer(){
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}



    $pdf = new FPDF('p', 'cm', 'A4');

    $pdf->AddPage();

    $pdf->header();

    $pdf->SetFont('Arial', '', 12);
    
    ///Cell parameteres - width - height - text - border 0/1 - next line 0->right 1->nextline - align LCR
    $pdf->cell(3, 3, "Nome", 0, 0, 'C');
    $pdf->cell(3, 3, "Produto", 0, 0, 'C');
    $pdf->cell(3, 3, "Qtd.", 0, 0, 'C');
    $pdf->cell(3, 3, "Preço", 0, 0, 'C');
    $pdf->cell(3, 3, "Total", 0, 1, 'C');
    $pdf->cell(3, 3, "Bolacha Maria", 0, 0, 'C');

    $pdf->footer();

    $pdf->OutPut();
?>