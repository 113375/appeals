<?php 
//Отправка по почте информации
header('Content-Type: application/json');
require "base.php";




function createPDF($data){
    define('FPDF_FONTPATH',"fpdf/font/");
    require('fpdf/fpdf.php');
    $pdf=new FPDF();
    $pdf->SetTitle("Обращение");
    $pdf->AddPage('P');
    $pdf->SetDisplayMode(real,'default');
    $pdf->AddFont('Arial','','arial.php'); 
    $pdf->SetFont('Arial');
    $pdf->SetFontSize(14);
    $pdf->SetMargins(10, 40);
    $pdf->Cell( 0, 20,iconv('utf-8', 'windows-1251',"От кого очень очень очень очень очень длинный текст"), 0, 1, 'R' );
    $pdf->Cell( 0, 20,iconv('utf-8', 'windows-1251',"От"." кого очень очень очень очень очень длинный текст"), 0, 1, 'R' );
    $pdf->Cell( 0, 50,iconv('utf-8', 'windows-1251',"Обращение"), 0, 1, 'C' );
    $pdf->WRITE( 7,iconv('utf-8', 'windows-1251', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique hendrerit tristique. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla eu mi ante. In interdum, lectus ac consequat ornare, quam orci pretium felis, eu sollicitudin nisi nisi nec arcu. Proin facilisis eros nec nisl aliquet, ut maximus justo porttitor. Nunc eget tristique velit. Suspendisse dapibus dignissim sodales. Nulla augue sapien, congue eget orci eget, feugiat vestibulum turpis. Maecenas laoreet efficitur velit, id venenatis leo pharetra porta. Pellentesque ultricies turpis eget justo consequat, quis luctus ex vestibulum. Curabitur tristique ultrices ultricies.
    Morbi tempus lobortis turpis, sit amet pulvinar nulla maximus at. Etiam dictum lacinia nisi sed tincidunt. Nullam eget purus id arcu sodales tempor ut ac dui. Etiam ut rutrum magna. Aenean leo dui, fermentum sit amet ante sollicitudin, interdum elementum arcu. Duis rutrum sem enim, ac volutpat lorem tristique in. Cras pellentesque euismod lorem eu porttitor. Fusce gravida vehicula leo, et gravida ligula placerat id. Ut in est blandit, varius nisi ut, hendrerit lacus. Fusce vel ipsum id nibh imperdiet aliquet ac aliquet mi. Cras porta nisl augue, ac pretium lectus luctus ac. Sed id mattis magna, quis viverra dolor. Maecenas purus lacus, lacinia a ultrices et, aliquet eget dolor.
    ") );
    $pdf->Cell(0, 0,iconv('utf-8', 'windows-1251',""), 0, 1, 'L' );
    $pdf->Cell(0, 25,iconv('utf-8', 'windows-1251',"Смотрите прикреплённые файлы в письме"), 0, 1, 'L' );


    $pdf->Cell(0, 25,iconv('utf-8', 'windows-1251',"Ответ прошу направить по электронной почте " . "Тут почта будет "), 0, 1, 'L' );




    $pdf->Output('appeal.pdf', 'F');
}

function sendEmail($data){   
    createPDF($data);
    return ["status"=> "pdf отправлены"];
}



$data = json_decode(file_get_contents("php://input"));
echo json_encode(sendEmail($data));
?>