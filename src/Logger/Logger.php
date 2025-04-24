<?php
namespace Logger;

use Pes\Logger\FileLogger;

/**
 * Description of Logger
 *
 * @author pes2704
 */
class Logger {
    public function request() {
        FileLogger::setBaseLogsDirectory(__DIR__.'/../..');
        $logger = FileLogger::getInstance('/_Logs/Request', 'Request.log', FileLogger::APPEND_TO_LOG);        
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        // Parse current URL
//        $parsed_url = parse_url($_SERVER['REQUEST_URI']);      
        
        $logger->info("$method: $uri");
    }
}
