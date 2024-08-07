<?php
    if(isset($_POST['reset'])) {
        $email = $_POST['email'];
    }
    else {
        exit();
    }
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'mail/Exception.php';
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'wrapifygiftshop203@gmail.com';                     // SMTP username
        $mail->Password   = 'sibuolevtjnypvcy';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('wrapifygiftshop203@gmail.com', 'Wrapify');
        $mail->addAddress($email);     // Add a recipient
        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password click <a href="http://localhost/wrapify/changepassword1.php?code='.$code.'">here </a>. </br>Reset your password in a day.';
        $conn = new mySqli('127.0.0.1', 'root', '', 'giftshopphp');
        if($conn->connect_error) {
            die('Could not connect to the database.');
        }
        $verifyQuery = $conn->query("SELECT * FROM siteuser WHERE emailid = '$email'");
        if($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE siteuser SET code = '$code' WHERE emailid = '$email'");
                
            $mail->send();
            echo 'Message has been sent, check your email';
        }
        else
        {
            echo "Please First Sign Up !!";
        }
        $conn->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    
?>