<?php
namespace Env;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Configuration
 *
 * @author pes2704
 */
class Configuration {
    const MAIL_HOST = 'smtp.cesky-hosting.cz';
    const MAIL_USERNAME = 'info@najdisi.cz';
    const MAIL_PASSWORD = 'Kostrčnenihouba';
    
    public static function form() {
        return [
            'mail_to_hr' => DEVELOPMENT ? ['svoboda@grafia.cz', 'Péťa'] : ['hanzikova.jaroslava@ponnath.cz', 'Hanzíková Jaroslava'],
            'mail_from' => ['web-ponnath-cz@ponnath.cz', 'Kariéra - KONTAKTNÍ FORMULÁŘ'],
        ];
    }
    
}
