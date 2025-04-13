<?php
namespace Controler;

use View\Includer;

/**
 * Description of Page
 *
 * @author pes2704
 */
class Page {
    public function withTemplate($templateName) {
        $context = [
        'langCode' => 'cs',
        'basePath' => BASE_PATH,
        'title' => 'Ponnath - family passion for better food',
        'linksSite' => 'public/',
        'logoImages' => 'public/img/logo/',
        'layoutImages' => 'public/img/',
        'layoutVideo' => 'public/video/',
        'bodyTemplate' => $templateName,
        ];
        $includer = new Includer();
        return $includer->protectedIncludeScope("local/templates/layout.php", $context);
    }
}
