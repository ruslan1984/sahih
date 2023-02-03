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

        // Настройки вашей почты
        $mail->Host = 'smtp.yandex.ru'; // SMTP сервера вашей почты
        $mail->Username = 'ruslan231984@yandex.ru'; // Логин на почте
        $mail->Password = 'igewrwqbdrgwjjky'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ruslan231984@yandex.ru', 'Имя отправителя'); // Адрес самой почты и имя отправителя
        $mail->addAddress($email);

        // Отправка сообщения
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $result=0;
        // Проверяем отравленность сообщения
        if ($mail->send()) {$result = 1;}
        else {$result = "error";}

        } catch (Exception $e) {
            $result = "error";
            $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
        }

        return $result;
    // echo json_encode(["result" => $result, "status" => $status||"1"]);
}

?>