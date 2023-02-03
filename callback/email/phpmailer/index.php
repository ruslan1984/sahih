<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';


function sendMail($email, $subject,  $message ){

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth = true;
        $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

        $mail->Host = 'smtp.yandex.ru'; // SMTP сервера вашей почты
        $mail->Username = 'ruslan231984'; // Логин на почте
        $mail->Password = 'igewrwqbdrgwjjky'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($email); // Адрес самой почты и имя отправителя
        $mail->addAddress($email);

        // Отправка сообщения
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $result=0;
        // Проверяем отравленность сообщения
        return $mail->send();
    }catch (Exception $e) {
        echo  $e->getMessage(), "\n";
    }

}
?>