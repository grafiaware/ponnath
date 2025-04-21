<?php
namespace Controler;

use Pes\Logger\FileLogger;

use Env\Configuration;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PhpMaileException;

/**
 * Description of Form
 *
 * @author pes2704
 */
class Form {
    
    const MAIL_CC_ARRAY = [];  // carbon copy
    const MAIL_BCC_ARRAY = [];  // blind carbon copy
    
    private $mailDebug = '';
    private $mailErrorInfo = '';

    public function form($name) {
        $post = $_POST;
        
        return $this->$name($post);
    }
    
    /**
     * Přijme proměnné fomuláře kariéra, odešle je e-mailem, zapíše obsah mailu do logu, přesměruje na GET kariéra.
     * Nevrací nic, končí exit (POST REDIRECT GET).
     * 
     * Pokud dojde k chybě při pokusu o odeslání mailu, loguje chybu a nevrací nic, končí také PRG. Jen pokud je nastavena 
     * konstanta DEVELOPMENT na true pošle také flash obsahující chybové hlášení.
     * 
     * Pokud je nastavená konstanta DEVELOPMENT na true - zjišťuje jestli nebyla data formuláře odeslána se skrytým 
     * polem 'test' - pokud ano, neposílá mail, jen loguje připravená data mailu a pošle flash
     * 
     * @param type $post
     */
    private function kariera($post) {
        
        // form data
        $name = filter_var($post['name'],FILTER_SANITIZE_SPECIAL_CHARS);
        $emailValidated = filter_var($post['email'], FILTER_VALIDATE_EMAIL);
        $email = $emailValidated===false ? "(UPOZORNĚNÍ! Návětšvník webu zadal chybný e-mail) ".$post['email'] : $emailValidated;
        $phone = filter_var($post['phone'],FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_var($post['address'],FILTER_SANITIZE_SPECIAL_CHARS);
        $job = filter_var($post['job'],FILTER_SANITIZE_SPECIAL_CHARS);
        $message = filter_var($post['message'],FILTER_SANITIZE_SPECIAL_CHARS);
        
        // Subject
        $subject = 'Mail z webu ponnath.cz';

        // Body
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
        
        // Addresses
        $toArray = Configuration::form()['mail_to_hr'];
        $fromArray = Configuration::form()['mail_from'];
        
        // Log
        $this->save("Subject: $subject");
        $this->save("From: $fromArray[1]$fromArray[0]");
        $this->save("To: $toArray[1]$toArray[0]");
        $this->save($body);

        // Mail it
        $isTest = DEVELOPMENT && isset($post['test']) && $post['test']=="testovací data";
        if ($isTest) {
            $this->save('Test success');
            $_SESSION['flash'][] = 'Mail test proběhl bez odeslání mailu.';            
        } else {
            try {
                $this->send($fromArray, $toArray, $subject, $body);
                $this->save('Success');
                $_SESSION['flash'][] = 'Mail odeslán';
            } catch (PhpMaileException $e) {
                $errorMessage = $this->mailErrorInfo;
                $this->save($errorMessage);
                if (DEVELOPMENT) {
                    $_SESSION['flash'][] = "Mail error: $errorMessage";                
                }
            }              
        }
        
        // PRG
        header('Location: '.BASE_PATH.'page/kariera');
        exit;
    }
    
    /**
     * 
     * @param array $fromArray
     * @param array $toArray
     * @param string $subject
     * @param string $body
     * @throws PhpMaileException PhpMailer vyhazuje vyjímku PHPMailer\PHPMailer\Exception
     */
    private function send(array $fromArray, array $toArray, string $subject, string $body) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF; //DEBUG_SERVER;   // debug dělá přímo echo v kódu maileru     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = Configuration::MAIL_HOST;               //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = Configuration::MAIL_USERNAME;                     //SMTP username
        $mail->Password   = Configuration::MAIL_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $mail->Encoding = PHPMailer::ENCODING_8BIT;  

        //Recipients
        $mail->setFrom($fromArray[0], mb_convert_encoding($fromArray[1], "UTF-8", "auto"));
        $mail->addAddress($toArray[0], mb_convert_encoding($toArray[1], "UTF-8", "auto"));  //Name is optional
//        $mail->addReplyTo('info@example.com', 'Information');
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');

        //Attachments
//        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = mb_convert_encoding($subject, "UTF-8", "auto");//'=?utf-8?B?'.base64_encode($subject).'?=';
        $mail->Body    = $body;
        $mail->AltBody = '';//This is the body in plain text for non-HTML mail clients';

        $mail->send();
    }
    
    private function save($message) {
        FileLogger::setBaseLogsDirectory(__DIR__.'/../..');
        $logger = FileLogger::getInstance('/_Logs/Mail', 'Mail.log', FileLogger::APPEND_TO_LOG);
        $logger->info($message);
    }
    
}
