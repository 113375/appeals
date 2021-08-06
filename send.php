<?php 
//Отправка по почте информации
header('Content-Type: multipart/form-data');
require "base.php";
define('FPDF_FONTPATH',"fpdf/font/");
require('fpdf/fpdf.php');

//подключаем почту 
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";



function createPDF($name, $photo=1){
    $pdf=new FPDF();
    $pdf->SetTitle("Обращение");
    $pdf->AddPage('P');
    $pdf->SetDisplayMode(real,'default');
    $pdf->AddFont('Arial','','arial.php'); 
    $pdf->SetFont('Arial');
    $pdf->SetFontSize(14);
    $pdf->SetMargins(10, 40);
    $pdf->Cell( 0, 20,iconv('utf-8', 'windows-1251',$name), 0, 1, 'R' );

    $namePerson = $_POST["name"];
    $surname = $_POST["surname"];
    $patronymic = $_POST["patronymic"];
    $pdf->Cell( 0, 20,iconv('utf-8', 'windows-1251',"От: $surname $namePerson $patronymic"), 0, 1, 'R' ); // от кого письмо

    
    $pdf->Cell( 0, 50,iconv('utf-8', 'windows-1251',"Обращение"), 0, 1, 'C' );

    $text = $_POST["text"];
    $pdf->WRITE( 7,iconv('utf-8', 'windows-1251', $text) );
    $pdf->Cell(0, 0,iconv('utf-8', 'windows-1251',""), 0, 1, 'L' );
    if($photo){
        $pdf->Cell(0, 40,iconv('utf-8', 'windows-1251',"Смотрите прикреплённые файлы в письме"), 0, 1, 'L' );
    }

    $email = $_POST["email"];
    $pdf->Cell(0, 25,iconv('utf-8', 'windows-1251',"Ответ прошу направить по электронной почте: " . $email), 0, 1, 'L' );

    $pdf->Output('appeal.pdf', 'F'); // сохраняем обращение на сервере 
}

function sendMessagePHPMailer($email, $emailInst){
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

        $mail->setFrom($email, 'Обращение'); // от кого отправляется
        $mail->addAddress($emailInst, ' '); // кому отправляется 
        $mail->Subject = 'Обращение с сайта obratis.com';
        $mail->addReplyTo($email, "Для ответа"); // кому должен отвечаться пользователь
        $mail->msgHTML(" ");
            // Attach uploaded files
        $mail->addAttachment("appeal.pdf");

        for ($ct = 0; $ct < count($_FILES['file']['tmp_name']); $ct++) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name'][$ct]));
            $filename = $_FILES['file']['name'][$ct];
            if (move_uploaded_file($_FILES['file']['tmp_name'][$ct], $uploadfile)) {
                $mail->addAttachment($uploadfile, $filename);
            }
        }
        $r = $mail->send();
        
    }catch(Exception $e){
        echo print_r($e);
    }
}

$ids = array($_POST["instances"]);
$email = $_POST["email"];
foreach($ids as $id){
    $inst = makeRequest("SELECT * FROM instance WHERE id = " . $id);
    $name = $inst[0]["title"];
    createPDF($name, count($_FILES['file']['tmp_name']));
    // sendMessagePHPMailer($email, $inst[0]["email"]); 
    // TODO раскоментировать на релизе 
}
$inst = ["email" =>  $_POST["email"]];
createPDF("Копия пользователю", count($_FILES['file']['tmp_name']));
sendMessagePHPMailer($email, $email); // отправляем копию пользователю

echo "Все отправлено, копия придет вам на почту";

$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']);



?>