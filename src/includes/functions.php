<?php

// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//  PDO MySQL database connection

function conn()
{
    $host = 'localhost';
    $db   = 'projeto';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
        $pdo = null;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}



// ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
//  PHP Mailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function email($to, $subject, $message, $output)
{
    require $_SERVER['DOCUMENT_ROOT'].'vendor/autoload.php';
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = '';
        $mail->SMTPAuth   = true;
        $mail->Username   = '';
        $mail->Password   = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('jorgegamito@gmail.com', 'Super App');
        $mail->addAddress($to);
        $mail->addReplyTo('no-reply@app.com', 'Information');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        //$mail->AltBody = 'Copy-past this code somewhere: '.$token;

        $mail->send();
        echo $output;
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}

function generatePDF(){
    require $_SERVER['DOCUMENT_ROOT'].'vendor/autoload.php';

    $pdf = new FPDF('p', 'cm', 'A4');

    $pdf->AddPage();

    $pdf->SetFont('Arial', '', 14);
    
    ///Cell parameteres - width - height - text - border 0/1 - next line 0->right 1->nextline - align LCR
    $pdf->cell(40, 10, "Name", 0, 0, 'C');

    $pdf->OutPut();
}