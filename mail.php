<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
    function send_mail($from,$password,$from_name,$to,$to_name,$subject,$msg){
        $mail = new PHPMailer();                                  // Passing `true` enables exceptions
        try {
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $from;                              // SMTP username
            $mail->Password = $password;                          // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to 587 for `ssl` 
            $mail->setFrom($from, $from_name);
            // $mail->addAddress('inquiry@xyz.com', 'Inquiry');       // Add a recipient
            
            // Content
            $mail->addAddress($to,$to_name);
            $mail->AddReplyTo($from,$from_name);
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;

            // This message will be displayed if body not found
            $mail->AltBody    = 'This is mail is automatically generated using PHP Mailer';
                        
            // Message Body
            $mail->Body =  $msg;
            
            if($mail->send()){
                return true;                    // email sent successfully
            }else{
                return false;                   // error in sending email
            }
            
        } catch (Exception $e) {
            return false;
        }
    }

?>