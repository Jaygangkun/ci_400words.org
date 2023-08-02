<?php
require_once APPPATH."Libraries/PHPMailer/Exception.php";
require_once APPPATH."Libraries/PHPMailer/PHPMailer.php";
require_once APPPATH."Libraries/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if(!function_exists('sendMail')){
    function sendMail($to, $subject, $body){
        
        $mail = new PHPMailer();

        $mail->IsSMTP();
        // $mail->Host = 'smtp.titan.email';
        // $mail->Username = 'editor@400words.org';
        // $mail->Password = '!B4ycgiyn2kmp!';
        // $mail->Port = 465;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = '400wordseditor@gmail.com';
        $mail->Password = 'qnilmhsezpfgkpux';
        $mail->Port = 587;

        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPDebug  = 1;  

        $mail->isHTML();

        $mail->From = '400wordseditor@gmail.com';
        $mail->FromName = '400words';

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AddAddress($to);

        if(!$mail->Send()) {
            echo $mail->ErrorInfo;
            return false;
        }
        return true;
    }
}

if(!function_exists('getSorts')){
    function getSorts(){
        return [
            'alphabetical' => 'alphabetical',
            'popular' => 'popular',
            'newest' => 'newest',
            'oldest' => 'oldest',
            'awaitingReview' => 'awaitingReview'
        ];
    }
}
