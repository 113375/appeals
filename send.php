<?php 
//Отправка по почте информации
header('Content-Type: application/json');
require "base.php";




function createPDF($data){
    // подключаем шрифты
    define('FPDF_FONTPATH',"fpdf/font/");
    // подключаем библиотеку
    require('fpdf/fpdf.php');

    // создаем PDF документ
    $pdf=new FPDF();
    // устанавливаем заголовок документа
    $pdf->SetTitle("Обращение");
    // создаем страницу
    $pdf->AddPage('P');
    $pdf->SetDisplayMode(real,'default');
    
    // добавляем шрифт ариал
    $pdf->AddFont('Arial','','arial.php'); 
    // устанавливаем шрифт Ариал
    $pdf->SetFont('Arial');
    // устанавливаем цвет шрифта
    $pdf->SetTextColor(250,60,100);
    // устанавливаем размер шрифта
    $pdf->SetFontSize(10);

    // добавляем текст
    $pdf->SetXY(10,10);
    $pdf->Write(0,iconv('utf-8', 'windows-1251',"Коммерческое предложение"));
    $pdf->Output('appeal.pdf', 'F');
}

function sendEmail($data){   
    createPDF($data);
    return ["status"=> "pdf отправлены"];
}



$data = json_decode(file_get_contents("php://input"));
echo json_encode(sendEmail($data));
?>