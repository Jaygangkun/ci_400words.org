<?php
require_once APPPATH."Libraries/PHPMailer/Exception.php";
require_once APPPATH."Libraries/PHPMailer/PHPMailer.php";
require_once APPPATH."Libraries/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if(!function_exists('sendMail')){
    function sendMail($to, $subject, $body){
        mail(
            $to,
            $subject,
            $body,
            array(
                'Content-type' => 'text/html; charset=iso-8859-1',
                'From' => 'contact@jpdinvestmentsllc.com',
                'Reply-To' => 'contact@jpdinvestmentsllc.com',
                'X-Mailer' => 'PHP/' . phpversion()
            )
        );

        // $mail = new PHPMailer();

        // $mail->IsSMTP();
        // $mail->Host = 'relay-hosting.secureserver.net';
        // $mail->Username = '_mainaccount@jpdinvestmentsllc.com';
        // $mail->Password = 'RTn?G_AY$eTi3';
        // $mail->Port = 587;

        // // $mail->Host = 'email-smtp.us-east-1.amazonaws.com';
        // // $mail->Username = 'AKIAXFSFI7CQLOLVJ2F5';
        // // $mail->Password = 'BADPdQfgqyrEQsikrH1nRwAYgMkZDhw5ZtIMFYTGAiqa';
        // // $mail->Port = 465;

        // $mail->SMTPAuth = false;
        // $mail->SMTPSecure = 'tls';
        // $mail->SMTPDebug  = 1;  

        // $mail->isHTML();

        // $mail->From = 'contact@jpdinvestmentsllc.com';
        // $mail->FromName = 'support jpdinvestmentsllc';

        // $mail->Subject = $subject;
        // $mail->Body    = $body;
        // $mail->AddAddress($to);

        // if(!$mail->Send()) {
        //     echo $mail->ErrorInfo;
        //     return false;
        // }
        // return true;
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

