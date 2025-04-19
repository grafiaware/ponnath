<?php
namespace Controler;

use Pes\Logger\FileLogger;

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
    
    /**
     * Přijme proměnné fomuláře kariéra, odešle je e-mailem, zapíše obsah mailu do logu, přesměruje na GET kariéra.
     * Nevrací nic, končí exit (POST REDIRECT GET).
     * 
     * Pokud dojde k chybě při pokusu o odeslání mailu, loguje chybu a nevrací nic, končí také PRG. Jen pokud je nastavena konstanta DEVELOPMENT na true pošle také flash obsahující chybové hlášení.
     * 
     * Pokud je nastavená konstanta DEVELOPMENT na true - zjišťuje jestli nebyla data formuláře odeslána se skrytým polem 'test' - pokud ano, neposílá mail, jen loguje připravená data mailu a pošle flash
     * 
     * @param type $post
     */
    private function kariera($post) {
        ini_set ("SMTP","posta.grafia.cz");
//        ini_set ("SMTP","localhost");
        ini_set ("sendmail_from","web-ponnath-cz@ponnath.cz");
        $name = filter_var($post['name'],FILTER_SANITIZE_SPECIAL_CHARS);
        $emailValidated = filter_var($post['email'], FILTER_VALIDATE_EMAIL);
        $email = $emailValidated===false ? "(UPOZORNĚNÍ! Byl zadán chybný e-mail) ".$post['email'] : $emailValidated;
        $phone = filter_var($post['phone'],FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_var($post['address'],FILTER_SANITIZE_SPECIAL_CHARS);
        $job = filter_var($post['job'],FILTER_SANITIZE_SPECIAL_CHARS);
        $message = filter_var($post['message'],FILTER_SANITIZE_SPECIAL_CHARS);
        
        // Multiple recipients
        if (DEVELOPMENT) {
            $to = 'svoboda@grafia.cz'; // více adres musí být odděleno čárkou

        } else {
            $to = 'svoboda@grafia.cz'; // více adres musí být odděleno čárkou
//            $to = 'hanzikova.jaroslava@ponnath.cz'; // více adres musí být odděleno čárkou    
        }

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

        $this->save($subject);
        $this->save($to);
        $this->save($body);
        
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

        // Additional headers
        // Multiple extra headers should be separated with a CRLF (\r\n)
//        $headers[] = 'To: Mary <mary@grafia.cz>'; // více adres musí být odděleno čárkou
        $headers[] = 'From: Formulář kariéra KONTAKTNÍ FORMULÁŘ <web-ponnath-cz@ponnath.cz>';
        //$headers[] = 'Cc: birthdayarchive@example.com';
//        $headers[] = 'Bcc: svoboda@grafia.cz';

        // Mail it
        $isTest = DEVELOPMENT && isset($post['test']) && $post['test']=="testovací data";
        if ($isTest) {
            $this->save('Test success');
            $_SESSION['flash'][] = 'Mail test proběhl.';            
        } else {
            $success = mail($to, $subject, $body, implode("\r\n", $headers));
            if (!$success) {
                $errorMessage = error_get_last()['message'];
                $this->save($errorMessage);
                if (DEVELOPMENT) {
                    $_SESSION['flash'][] = "Mail error: $errorMessage";                
                }
            } else {
                $this->save('Success');
                $_SESSION['flash'][] = 'Mail odeslán';
            }
        }
        
        // PRG
        header('Location: '.BASE_PATH.'page/kariera');
        exit;
    }
    
    private function save($message) {
        FileLogger::setBaseLogsDirectory(__DIR__.'/../..');
        $logger = FileLogger::getInstance('/_Logs/Mail', 'Mail.log', FileLogger::APPEND_TO_LOG);
        $logger->info($message);
    }
    
}
