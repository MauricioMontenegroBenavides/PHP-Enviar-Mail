<?php

   require("vendor/autoload.php");// Con esto llamo a la dependencias de php-mailer


   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;


   function enviar($subject,$body,$email,$name,$html=false){

    // Configuracion inicial de nuestro servidor
              
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    // $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    // $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
    $phpmailer->Port = 2525;
    //$phpmailer->Port = 465;
    $phpmailer->Username = '93899de7d4cc36';
    //$phpmailer->Username = 'Aqui va nuestro correo de gmail';
    $phpmailer->Password = 'e0918990239726';
    //$phpmailer->Password = 'Aqui va la contraseña que nos genero google';



      //Añadir destinatarios
    $phpmailer->setFrom('contact@miempresa.com', 'Mi empresa');// Quien envia 
    $phpmailer->addAddress($email, $name); //quien recibe 
         
       // DEFINIR EL CONTENIDO DEL EMAil o el correo
    $phpmailer->isHTML($html);//Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;
       //$phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';



       // Aqui se manda le correo 
    $phpmailer->send();
            

   }


?>