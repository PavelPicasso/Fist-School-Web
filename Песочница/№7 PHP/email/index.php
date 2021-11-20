<?php
 
use PHPMailer\PHPMailer\PHPMailer;
 
require '/vendor/autoload.php';
 
 
try {
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->Port = 465;
    $mail->Username = 'pablo.osamu@yandex.ru';
    $mail->Password = 'password';
     
    $mail->setFrom('pablo.osamu@yandex.ru', 'test.ru');
    $mail->addAddress('pablo.osamu@yandex.ru', 'Иван Петров');
    $mail->Subject = 'test';
     
    $body = '<p><strong>«Hello, world!» </strong></p>';
     
    $mail->msgHTML($body);
    
    
    $mail->send();
} catch(\Throwable $e) {
    var_dump($e);
    die();
}