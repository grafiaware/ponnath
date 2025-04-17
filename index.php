<?php
declare(strict_types=1);

use Router\Router;
use Controler\Page;

include 'vendor/autoload.php';

const DEVELOPMENT = true;// false;
define('PROJECT_PATH', str_replace("\\", "/", preg_replace('/^'.preg_quote($_SERVER['DOCUMENT_ROOT'], '/') . '/', '', __DIR__))."/");

define('BASE_PATH', "/ponnath/");  // musí začínat a končit / (nebo jen jedno "/")
$router = new Router();

$router->addRoute('GET', '/', function () {
    $ctrl = new Page();
    return $ctrl->withTemplate('home');
});
//$router->addRoute('GET', '/router', function () {
//    return "My route is working!";
//});
//$router->addRoute('GET', '/blogs/:blogID', function ($blogID) {
//    return "My route is working with blogID => $blogID !";
//});
$router->addRoute('GET', '/page/:name', function ($name) {
    $ctrl = new Page();
    return $ctrl->withTemplate($name);
});

try {
    $body = $router->dispatch(BASE_PATH);
    echo $body;
} catch (UnexpectedValueException $exc) {
            http_response_code(404);
    if (DEVELOPMENT) {
        $message = $exc->getMessage();
    } else {
        $message = "404 Not Found";        
    }
    http_response_code(404);    
    echo $message;
}
         

