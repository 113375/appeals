<?php 
//Отправка по почте информации
header('Content-Type: application/json');
require "base.php";
define('FPDF_FONTPATH',"fpdf/font/");
require('fpdf/fpdf.php');

//подключаем почту 
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";



function createPDF($data, $name){
    $pdf=new FPDF();
    $pdf->SetTitle("Обращение");
    $pdf->AddPage('P');
    $pdf->SetDisplayMode(real,'default');
    $pdf->AddFont('Arial','','arial.php'); 
    $pdf->SetFont('Arial');
    $pdf->SetFontSize(14);
    $pdf->SetMargins(10, 40);
    $pdf->Cell( 0, 20,iconv('utf-8', 'windows-1251',$name), 0, 1, 'R' );

    $namePerson = $data->name;
    $surname = $data->surname;
    $patronymic = $data->patronymic;
    $pdf->Cell( 0, 20,iconv('utf-8', 'windows-1251',"От: $surname $namePerson $patronymic"), 0, 1, 'R' ); // от кого письмо

    $pdf->Cell( 0, 50,iconv('utf-8', 'windows-1251',"Обращение"), 0, 1, 'C' );

    $text = $data->text;
    $pdf->WRITE( 7,iconv('utf-8', 'windows-1251', $text) );
    $pdf->Cell(0, 0,iconv('utf-8', 'windows-1251',""), 0, 1, 'L' );
    $pdf->Cell(0, 40,iconv('utf-8', 'windows-1251',"Смотрите прикреплённые файлы в письме"), 0, 1, 'L' );

    $email = $data->email;
    $pdf->Cell(0, 25,iconv('utf-8', 'windows-1251',"Ответ прошу направить по электронной почте: " . $email), 0, 1, 'L' );

    $pdf->Output('appeal.pdf', 'F'); // сохраняем обращение на сервере 
}

function sendMessagePHPMailer($email, $inst, $data){
    try{
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();   
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        $mail->Host = 'ssl://smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'obratis7@gmail.com';
        $mail->Password = 'sybhuz-5pisce-honjiS';
            // TODO после того, как залил на сервер, надо будет использовать это 
            // $mail->Host = 'ssl://serverXXX.hosting.reg.ru';
            // $mail->Port = 465;
            // $mail->Username = 'Логин@домен.ru';
            // $mail->Password = 'Пароль';

        $mail->setFrom($email, 'Обращение');
        $mail->addAddress($email, '');
        $mail->Subject = 'ОБращение с сайта obratis.com';
        $mail->addReplyTo($email, "Для ответа");
        $mail->msgHTML("My message body");
            // Attach uploaded files
        $mail->addAttachment("appeal.pdf");
        $r = $mail->send();
        
    }catch(Exception $e){
        echo $e;
    }
}

function sendEmail($data){
    $ids = $data->instances;
    foreach($ids as $id){
        $inst = makeRequest("SELECT * FROM instance WHERE id = " . $id);
        $name = $inst[0]["title"];
        createPDF($data, $name);
        $email = $data->$email;
        $email = "knyazevdima05@gmail.com";
        sendMessagePHPMailer($email, $inst, $data);
    }
}


function processing($data){   
    sendEmail($data);
    return ["status"=> "pdf отправлены"];
}



$data = json_decode(file_get_contents("php://input"));
echo json_encode(processing($data));
?>