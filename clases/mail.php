<?php
namespace App;
use PHPMailer\PHPMailer\PHPMailer;

class mail {
    public static function send($email,$body) {
        return Self::sendMails("igomis@cipfpbatoi.es", "Su nueva contraseña.",$body);
    }
    private static function sendMails($email,  $subject = "", $body =""){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;  // cambiar a 1 o 2 para ver errores
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 587;
        $mail->Username   = "cipfpbatoi2daw@gmail.com";  //usuario de gmail
        $mail->Password   = "2dawDWES"; //contraseña de gmail
        $mail->SetFrom('noreply@empresafalsa.com', 'Sistema de pedidos');
        $mail->Subject    = $subject;
        $mail->MsgHTML($body);

        $mail->AddAddress($email, $email);
      
        if(!$mail->Send()) {
            return $mail->ErrorInfo;
        } else {
            return TRUE;
        }
    }
}