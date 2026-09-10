<?php 

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = MAIL_SERVER;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = SITE_EMAIL;                     //SMTP username
    $mail->Password   = MAIL_PASSWORD;                               //SMTP password
    $mail->SMTPSecure = 'tls';
    // PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->ClearReplyTos();
    $mail->addReplyTo(SITE_EMAIL);

    $mail->setFrom(SITE_EMAIL, SITE_NAME);