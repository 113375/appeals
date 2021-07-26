<?php 
//Отправка по почте информации
header('Content-Type: application/json');
require "base.php";

function sendEmail($data){
    require('fpdf/fpdf.php'); 
    $pdf = new FPDF('P', 'pt', 'Letter');
    $pdf->AddPage(); 
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(100, 16, "Hello, World!");
    $pdf->Output('reciept.pdf', 'F');
    return ["status"=> "pdf отправлены"];
}



$data = json_decode(file_get_contents("php://input"));
echo json_encode(sendEmail($data));
?>