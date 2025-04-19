<?php
declare(strict_types=1);

use Router\Router;
use Controler\Page;
use Controler\Form;

include 'vendor/autoload.php';

// kontanty
define('PROJECT_PATH', str_replace("\\", "/", preg_replace('/^'.preg_quote($_SERVER['DOCUMENT_ROOT'], '/') . '/', '', __DIR__))."/");

const DEVELOPMENT = false; // true;// false;
const BASE_PATH = "/";  // musí začínat a končit / (nebo jen jedno "/")

// router
$router = new Router();
$router->addRoute('GET', '/', function () {
    $ctrl = new Page();
    return $ctrl->withTemplate('home');
});
$router->addRoute('GET', '/page/:name', function ($name) {
    $ctrl = new Page();
    return $ctrl->withTemplate($name);
});
$router->addRoute('POST', '/form/:name', function ($name) {
    $ctrl = new Form();
    return $ctrl->form($name);
});
 // session
session_start();  // jen pro flash

// run
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
    echo $message;
}
         

