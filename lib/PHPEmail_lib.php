<?php

/* 
| Author    : Muhamad Yusup Hamdani
| Mail      : me@dani.work
| 
| Collage   : STIKOM BINANIAGA
| NPM       : 14177063
|
| Filename  : PHPMailer_lib.php
| 
*/
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPEmail {

    public $mail;
    public $from;
    public $fromName;
    public $to;
    public $toName;

    function __construct()
    {
        $this->mail = new PHPMailer(true);
        try {
            //Server settings
            $this->mail->SMTPDebug  = 2;                                       // Enable verbose debug output
            $this->mail->isSMTP();                                            // Set mailer to use SMTP
            $this->mail->Host       = 'smtp.googlemail.com';  // Specify main and backup SMTP servers
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            
            // Untuk Gmail aktifkan LessSecureApps di : https://myaccount.google.com/u/0/lesssecureapps?pli=1
            $this->mail->Username   = '';                     // SMTP username
            $this->mail->Password   = '';                               // SMTP password
            
            $this->mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port       = 587;                                    // TCP port to connect to
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            die;
        }
    }

    function send($subject, $body, $html=true) {
        //Recipients
        $this->mail->setFrom($this->from, $this->fromName);
        $this->mail->addAddress($this->to, $this->toName);     // Add a recipient           
        
        // Content
        $this->mail->isHTML(true);                              // Set email format to HTML
        $this->mail->Subject = $subject;

        if($html) {
            $this->mail->Body    = $body;
        } else {
            $this->mail->AltBody = $html;
        }
        
        return $this->mail->send();
    }

    function addAttachment($path) {
        $this->mail->addAttachment($path);         // Add attachments
    }
    
}