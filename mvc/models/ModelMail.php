<?php
    include './lib/PHPMailer-master/src/Exception.php';
    include './lib/PHPMailer-master/src/OAuth.php';
    include './lib/PHPMailer-master/src/PHPMailer.php';
    include './lib/PHPMailer-master/src/POP3.php';
    include './lib/PHPMailer-master/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class ModelMail {
        public function sendMail($to, $subject, $body) {
            
            $mail = new PHPMailer(true);

            $mail->isSMTP(); 
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'khanh26122000@gmail.com';                     // SMTP username
            $mail->Password   = '';     // password email
            $mail->Port       = 587;   
        
            $mail->CharSet = "UTF-8";
            $mail->setFrom('khanh26122000@gmail.com', 'K-Tech');
            $mail->addAddress($to);            
            $mail->addReplyTo('khanh26122000@gmail.com', 'Phản hồi khách hàng');
        
            // content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
        
            $mail->send();
        }
    }
?>