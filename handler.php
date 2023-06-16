<?php

require_once __DIR__.'/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$response = [
    'result' => 0,
    'msg' => 'Неизвестная ошибка!'
];

$request = json_decode(file_get_contents("php://input"), true);

if(!isset($request['fields'])) {
    $response['msg'] = 'Ошибка сервера!';
    die(json_encode($response));
}

$fields = $request['fields'];

$message = "Оставлена заявка на сайте " . $_SERVER['SERVER_NAME'] . PHP_EOL;
foreach ($fields as $field) {
    $message .= "{$field['name']}: {$field['value']} \n";
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    // Заполнить тут
    $mail->Host       = 'smtp.mail.ru';    // smtp почты
    $mail->SMTPAuth   = true;
    // Заполнить тут
    $mail->Username   = 'duha000750@mail.ru';    // сам email
    // Заполнить тут
    $mail->Password   = '0hHQyhKceC3WXMnRH7Rx';  // пароль от почты
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Заполнить тут
    $mail->setFrom('duha000750@mail.ru', $_SERVER['SERVER_NAME']);// вместо duha000750@mail.ru подставьте свой e-mail, указанный выше
    // Заполнить тут
    $mail->addAddress('duha000750@mail.ru');       // Это email получателя, на который должны приходить письма. Указывайте любой тот, который нужен.
    // Можно указать тот же адрес, что и адрес отправителя, тогда письма будут отправляться "самому себе"

    //Content
    $mail->isHTML(false);
    $mail->Subject = 'Заполненная форма';
    $mail->Body    = $message;

    $mail->send();

    $response['result'] = 1;
    $response['msg'] = 'Спасибо! Ваша заявка отправлена. В ближайшее время мы с вами свяжемся!';
    die(json_encode($response));
} catch (Exception $e) {
    $response['msg'] = 'Ошибка отправки формы!';
    die(json_encode($response));
}