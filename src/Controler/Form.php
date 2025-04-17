<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Controler;

/**
 * Description of Form
 *
 * @author pes2704
 */
class Form {
    public function form($name) {
        $post = $_POST;
        
        return $this->$name($post);
    }
    
    private function kariera($post) {
        ini_set ("SMTP","posta.grafia.cz");
        ini_set ("sendmail_from","web-ponnath-cz@ponnath.cz");
        $name = filter_var($post['name'],FILTER_SANITIZE_SPECIAL_CHARS);
        $emailValidated = filter_var($post['email'], FILTER_VALIDATE_EMAIL);
        $email = $emailValidated===false ? "(UPOZORNĚNÍ! Byl zadán chybný e-mail) ".$post['email'] : $emailValidated;
        $phone = filter_var($post['phone'],FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_var($post['address'],FILTER_SANITIZE_SPECIAL_CHARS);
        $job = filter_var($post['job'],FILTER_SANITIZE_SPECIAL_CHARS);
        $message = filter_var($post['message'],FILTER_SANITIZE_SPECIAL_CHARS);
        
// Multiple recipients
$to = 'svoboda@grafia.cz'; // více adres musí být odděleno čárkou

// Subject
$subject = 'Mail z webu ponnath.cz';

// Message
        $body = "
        <!DOCTYPE html>
        <html lang=\"cs\">
            <head>
                <title>Zpráva z webu ponnath.cz</title>
                <meta charset=\"UTF-8\">
                <style type=\"text/css\">html {height:100%;} html, 
                             body {width:100%;min-height:100%;}
                </style>
            </head>
            <body>
                <h3>KONTAKTNÍ FORMULÁŘ</h3>
                <p><b>Jméno a příjmení:</b> $name</p>
                <p><b>E-mail:</b> $email</p>
                <p><b>Telefonní číslo:</b> $phone</p>
                <p><b>Bydliště:</b> $address</p>
                <p><b>Název pozice, o kterou máte zájem:</b> $job</p>
                <p><b>Vaše zpráva (volitelně):</b> $message</p>

            </body>
        </html>
                ";

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

        // Additional headers
//        $headers[] = 'To: Mary <mary@grafia.cz'; // více adres musí být odděleno čárkou
        $headers[] = 'From: Formulář kariéra KONTAKTNÍ FORMULÁŘ <web-ponnath-cz@ponnath.cz>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
        $headers[] = 'Bcc: slehoferova@grafia.cz';

        // Mail it
        mail($to, $subject, $body, implode("\r\n", $headers));        
    }
}
